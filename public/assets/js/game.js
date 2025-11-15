// public/assets/js/game.js
// Minimal, modern, no dependency

const startBtn = document.getElementById("startBtn");
const resetBtn = document.getElementById("resetBtn");
const guessBtn = document.getElementById("guessBtn");
const guessInput = document.getElementById("guessInput");
const feedback = document.getElementById("feedback");
const attemptCounter = document.getElementById("attemptCounter");
const leaderboardList = document.getElementById("leaderboardList");
const refreshLbBtn = document.getElementById("refreshLb");
const playerNameInput = document.getElementById("playerName");

let currentAttempts = 0;

function setFeedback(text, type = "info") {
    let color = "text-gray-700 bg-gray-100";
    if (type === "success") color = "text-green-800 bg-green-100";
    if (type === "error") color = "text-red-800 bg-red-100";
    if (type === "warn") color = "text-yellow-800 bg-yellow-100";

    feedback.className = `p-3 rounded text-sm ${color}`;
    feedback.textContent = text;
}

async function startGame() {
    try {
        const res = await fetch("/api/start", {
            method: "POST",
            headers: { Accept: "application/json" },
            credentials: "include",
        });
        const data = await res.json();
        setFeedback(data.message, "info");
        currentAttempts = 0;
        updateAttemptCounter();
        loadLeaderboard();
    } catch (err) {
        setFeedback("Gagal memulai game. Cek koneksi.", "error");
    }
}

async function guess() {
    const guessVal = guessInput.value;
    if (!guessVal) {
        setFeedback("Masukkan angka antara 1 dan 100.", "warn");
        return;
    }

    try {
        const payload = {
            guess: parseInt(guessVal, 10),
            player_name: playerNameInput.value || null,
        };

        const res = await fetch("/api/guess", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify(payload),
            credentials: "include",
        });

        const data = await res.json();

        if (!res.ok) {
            let msg = data.message || "Response error";
            setFeedback(msg, "error");
            return;
        }

        currentAttempts = data.attempts ?? currentAttempts;
        updateAttemptCounter();

        if (data.status === "correct") {
            setFeedback(data.message, "success");
            loadLeaderboard();
        } else if (data.status === "high") {
            setFeedback(data.message, "warn");
        } else if (data.status === "low") {
            setFeedback(data.message, "warn");
        } else {
            setFeedback(data.message || "Respon tidak terduga", "info");
        }
    } catch (err) {
        setFeedback("Terjadi kesalahan saat mengirim tebakan.", "error");
    }
}

function updateAttemptCounter() {
    attemptCounter.textContent = `Percobaan: ${currentAttempts}`;
}

async function loadLeaderboard() {
    try {
        const res = await fetch("/api/leaderboard?limit=5", {
            method: "GET",
            headers: { Accept: "application/json" },
            credentials: "include",
        });
        const data = await res.json();

        leaderboardList.innerHTML = "";
        if (!Array.isArray(data) || data.length === 0) {
            leaderboardList.innerHTML =
                '<li class="text-sm text-gray-500">Belum ada skor.</li>';
            return;
        }

        data.forEach((row, idx) => {
            const name = row.player_name ? row.player_name : "Guest";
            const date = new Date(row.created_at).toLocaleString();
            const li = document.createElement("li");
            li.className =
                "p-2 bg-gray-50 rounded flex justify-between items-center";
            li.innerHTML = `<span class="font-medium">${idx + 1}. ${name}</span>
                            <span class="text-sm text-gray-600">${
                                row.attempts
                            } percobaan</span>`;
            leaderboardList.appendChild(li);
        });
    } catch (err) {
        leaderboardList.innerHTML =
            '<li class="text-sm text-red-500">Gagal memuat leaderboard.</li>';
    }
}

startBtn.addEventListener("click", startGame);
guessBtn.addEventListener("click", guess);
refreshLbBtn.addEventListener("click", loadLeaderboard);

// Force reset: clear session by calling start (start will set a new secret)
resetBtn.addEventListener("click", () => {
    startGame();
    setFeedback("Permainan di-reset (force).", "info");
});

// Initialize: load leaderboard on page load
document.addEventListener("DOMContentLoaded", () => {
    loadLeaderboard();
    updateAttemptCounter();
});
