<?php
define('BOT_TOKEN', 'YOUR_BOT_TOKEN_HERE'); // توکن ربات
define('API_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');

// تابع فرضی برای ارسال ری‌اکشن (در Bot API فعلاً وجود ندارد)
function sendReaction($chat_id, $message_id, $reaction) {
    // این فقط یک ساختار نمایشی است — در Bot API واقعی فعلاً چنین متدی وجود ندارد
    $data = [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'reaction' => $reaction // مثل "👍", "❤️", "🔥"
    ];

    // فرضی: اگر متدی به نام sendReaction وجود داشت
    $response = file_get_contents(API_URL . "sendReaction?" . http_build_query($data));
    return $response;
}

// دریافت ورودی از کاربر (POST)
$chat_id = $_GET['chat_id'] ?? null;
$message_id = $_GET['message_id'] ?? null;
$reaction = $_GET['reaction'] ?? '👍';

if ($chat_id && $message_id) {
    $result = sendReaction($chat_id, $message_id, $reaction);
    echo "Reaction sent: " . $reaction . "<br>";
    echo "Telegram API response: <br>" . $result;
} else {
    echo "Missing chat_id or message_id parameters.";
}
?>
