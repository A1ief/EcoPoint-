<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // URL API
    private $apiBaseUrl;
    private $timeout = 15;
    private $connectTimeout = 5;

    public function __construct()
    {
        // Ambil dari .env, default ke localhost
        $this->apiBaseUrl = env('API_URL', 'http://127.0.0.1:8000/api');
        
        // Jika menggunakan domain yang sama, gunakan internal call
        if (env('USE_INTERNAL_API', false)) {
            $this->apiBaseUrl = env('API_INTERNAL_URL', 'http://127.0.0.1:8000/api');
        }
    }

    /**
     * Cek apakah API server online
     */
    private function checkApiHealth()
    {
        try {
            $response = Http::timeout(3)
                ->connectTimeout(2)
                ->get($this->apiBaseUrl . '/health');
            
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Fungsi helper untuk melakukan HTTP request
     */
    private function makeRequest($method, $url, $data = [])
    {
        try {
            // Cek kesehatan API terlebih dahulu (opsional, bisa di-comment jika memperlambat)
            // if (!$this->checkApiHealth()) {
            //     throw new \Exception('API Server tidak merespon. Pastikan server API berjalan di: ' . $this->apiBaseUrl);
            // }

            $http = Http::timeout($this->timeout)
                ->connectTimeout($this->connectTimeout)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]);

            // Tambahkan token jika ada
            if (session('api_token')) {
                $http = $http->withToken(session('api_token'));
            }

            $response = $http->{$method}($url, $data);
            
            return $response;
            
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error("API Connection Error: " . $e->getMessage(), [
                'url' => $url,
                'method' => $method
            ]);
            
            throw new \Exception('Tidak dapat terhubung ke API Server. Pastikan API berjalan di: ' . $this->apiBaseUrl);
            
        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error("API Request Error: " . $e->getMessage());
            throw new \Exception('Error saat request ke API: ' . $e->getMessage());
            
        } catch (\Exception $e) {
            Log::error("General API Error: " . $e->getMessage());
            throw $e;
        }
    }

    // INDEX - Tampilkan semua user
    public function index(Request $request)
    {
        try {
            $url = $this->apiBaseUrl . '/users';
            
            // Parameter untuk filter
            $params = array_filter([
                'search' => $request->search,
                'status' => $request->status,
                'role' => $request->role,
            ], function($value) {
                return !is_null($value) && $value !== '';
            });
            
            // Panggil API dengan parameter
            $response = $this->makeRequest('get', $url, $params);
            
            if ($response->successful()) {
                $data = $response->json();
                $users = $data['data'] ?? $data ?? [];
                
                return view('dashboard.user.index', [
                    'users' => $users,
                    'totalUsers' => count($users),
                    'apiStatus' => 'online'
                ]);
            }
            
            return view('dashboard.user.index', [
                'users' => [],
                'totalUsers' => 0,
                'apiStatus' => 'error',
                'error' => 'API Error: ' . $response->status() . ' - ' . ($response->json()['message'] ?? 'Unknown error')
            ]);
            
        } catch (\Exception $e) {
            return view('dashboard.user.index', [
                'users' => [],
                'totalUsers' => 0,
                'apiStatus' => 'offline',
                'error' => $e->getMessage()
            ]);
        }
    }

    // CREATE - Tampilkan form tambah user
    public function create()
    {
        return view('dashboard.user.create');
    }

    // STORE - Simpan user baru ke API
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'nullable|string',
            'role' => 'required|string',
            'password' => 'required|min:6'
        ]);

        try {
            $response = $this->makeRequest('post', $this->apiBaseUrl . '/users', $validated);
            
            if ($response->successful()) {
                return redirect()->route('dashboard.user.index')
                    ->with('success', 'User berhasil ditambahkan');
            }
            
            $errorData = $response->json();
            $errorMessage = $errorData['message'] ?? 'Gagal menambahkan user';
            
            return back()->withInput()->with('error', $errorMessage);
            
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    // SHOW - Tampilkan detail user
    public function show($id)
    {
        try {
            $response = $this->makeRequest('get', $this->apiBaseUrl . "/users/{$id}");
            
            if ($response->successful()) {
                $data = $response->json();
                $user = $data['data'] ?? $data;
                
                return view('dashboard.user.show', compact('user'));
            }
            
            return redirect()->route('dashboard.user.index')
                ->with('error', 'User tidak ditemukan');
            
        } catch (\Exception $e) {
            return redirect()->route('dashboard.user.index')
                ->with('error', $e->getMessage());
        }
    }

    // EDIT - Tampilkan form edit user
    public function edit($id)
    {
        try {
            $response = $this->makeRequest('get', $this->apiBaseUrl . "/users/{$id}");
            
            if ($response->successful()) {
                $data = $response->json();
                $user = $data['data'] ?? $data;
                
                return view('dashboard.user.edit', compact('user'));
            }
            
            return redirect()->route('dashboard.user.index')
                ->with('error', 'User tidak ditemukan');
            
        } catch (\Exception $e) {
            return redirect()->route('dashboard.user.index')
                ->with('error', $e->getMessage());
        }
    }

    // UPDATE - Update user di API
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'nullable|string',
            'role' => 'required|string',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $validated['is_active'] ?? 1;

        try {
            $response = $this->makeRequest('put', $this->apiBaseUrl . "/users/{$id}", $validated);
            
            if ($response->successful()) {
                return redirect()->route('dashboard.user.index')
                    ->with('success', 'User berhasil diupdate');
            }
            
            $errorData = $response->json();
            $errorMessage = $errorData['message'] ?? 'Gagal mengupdate user';
            
            return back()->with('error', $errorMessage);
            
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // DESTROY - Hapus user dari API
    public function destroy($id)
    {
        try {
            $response = $this->makeRequest('delete', $this->apiBaseUrl . "/users/{$id}");
            
            if ($response->successful()) {
                return redirect()->route('dashboard.user.index')
                    ->with('success', 'User berhasil dihapus');
            }
            
            return redirect()->route('dashboard.user.index')
                ->with('error', 'Gagal menghapus user');
            
        } catch (\Exception $e) {
            return redirect()->route('dashboard.user.index')
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Method untuk test koneksi API
     */
    public function testConnection()
    {
        $tests = [];
        
        // Test 1: Basic connectivity
        try {
            $start = microtime(true);
            $response = Http::timeout(5)->get($this->apiBaseUrl . '/users');
            $duration = round((microtime(true) - $start) * 1000, 2);
            
            $tests['basic'] = [
                'status' => $response->successful() ? 'success' : 'error',
                'http_code' => $response->status(),
                'duration_ms' => $duration,
                'url' => $this->apiBaseUrl . '/users'
            ];
        } catch (\Exception $e) {
            $tests['basic'] = [
                'status' => 'error',
                'message' => $e->getMessage(),
                'url' => $this->apiBaseUrl . '/users'
            ];
        }
        
        // Test 2: Check if port is accessible
        $tests['port_check'] = [
            'status' => @fsockopen('127.0.0.1', 8000, $errno, $errstr, 3) ? 'open' : 'closed',
            'error' => $errno ? "$errno: $errstr" : null
        ];
        
        // Test 3: Environment check
        $tests['environment'] = [
            'api_url' => $this->apiBaseUrl,
            'php_version' => PHP_VERSION,
            'curl_enabled' => function_exists('curl_version'),
            'curl_version' => function_exists('curl_version') ? curl_version()['version'] : 'N/A'
        ];
        
        return response()->json($tests, 200);
    }
}