<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Game Tebak Angka - Level Menengah</title>

  <!-- Tailwind via CDN untuk cepat (opsional: kamu bisa compile asset sendiri) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <meta name="description" content="Game Tebak Angka - Laravel">
</head>
<body class="bg-gray-100 min-h-screen flex items-start justify-center py-12">
  <div class="w-full max-w-3xl bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-semibold mb-4">Game Tebak Angka — Level Menengah</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Game area -->
      <div>
        <div class="mb-4">
          <button id="startBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Mulai Game</button>
          <button id="resetBtn" class="px-4 py-2 ml-2 bg-gray-300 rounded hover:bg-gray-400">Reset (force)</button>
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Nama (opsional)</label>
          <input id="playerName" type="text" maxlength="50" placeholder="Masukkan nama (untuk leaderboard)" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Tebakan (1 - 100)</label>
          <input id="guessInput" type="number" min="1" max="100" placeholder="Masukkan tebakanmu" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <div class="flex items-center gap-2 mb-4">
          <button id="guessBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Tebak!</button>
          <p id="attemptCounter" class="text-sm text-gray-600">Percobaan: 0</p>
        </div>

        <div id="feedback" class="p-3 rounded text-sm"></div>
      </div>

      <!-- Leaderboard -->
      <div>
        <h2 class="text-lg font-medium mb-2">Leaderboard (Top 5)</h2>
        <ul id="leaderboardList" class="space-y-2"></ul>

        <div class="mt-4">
          <button id="refreshLb" class="px-3 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Refresh Leaderboard</button>
        </div>
      </div>
    </div>

    <p class="mt-6 text-xs text-gray-500">Catatan: game menyimpan angka rahasia di session. Jika kamu menutup tab, session mungkin hilang tergantung konfigurasi server.</p>
  </div>

  <script src="/assets/js/game.js"></script>
</body>
</html>
