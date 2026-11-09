<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ecommerce_web";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8mb4');

if (!function_exists('db_scalar')) {
    /** Run a query and return the first column of the first row (0 if empty). */
    function db_scalar($conn, $sql, $default = 0)
    {
        $r = mysqli_query($conn, $sql);
        if (!$r) return $default;
        $row = mysqli_fetch_row($r);
        mysqli_free_result($r);
        return ($row && $row[0] !== null) ? $row[0] : $default;
    }

    /** HTML-escape. */
    function e($v): string
    {
        return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
    }

    /** Format as Rupiah. */
    function rupiah($v): string
    {
        return 'Rp ' . number_format((float) $v, 2, ',', '.');
    }

    /** Map any status string to a Tailwind badge class. */
    function status_class($status): string
    {
        $s = strtolower(trim((string) $status));
        $ok  = ['lunas', 'paid', 'success', 'berhasil', 'selesai', 'delivered', 'terkirim', 'completed', 'done'];
        $warn = ['pending', 'belum', 'menunggu', 'diproses', 'processing', 'dikirim', 'shipped', 'dikemas'];
        $bad  = ['gagal', 'failed', 'batal', 'cancel', 'cancelled', 'dibatalkan', 'refund'];
        if (in_array($s, $ok, true))   return 'bg-[#10b981]/20 text-[#6ee7b7] border-[#10b981]/30';
        if (in_array($s, $warn, true)) return 'bg-badge-warning/20 text-[#fde047] border-badge-warning/30';
        if (in_array($s, $bad, true))  return 'bg-badge-danger/20 text-[#fca5a5] border-badge-danger/30';
        return 'bg-primary-container/20 text-primary border-primary-container/30';
    }
}