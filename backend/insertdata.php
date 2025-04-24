<?php
    include 'connection.php';

    $sql = "INSERT INTO notes (title, text, date)
    VALUES
    ('Exercise', 'Engage in a physical activity, such as a brisk walk, workout, or yoga, to boost energy levels and improve mood.', CURRENT_TIMESTAMP),
    ('Mindfulness practices', 'Dedicate a few minutes to meditation or journaling to calm the mind and set positive intentions for the day.', CURRENT_TIMESTAMP),
    ('Eat a healthy breakfast', 'Fuel your body with a nutritious meal to provide sustained energy and focus for the day', CURRENT_TIMESTAMP),
    ('Minimize distractions', 'Avoid checking social media or email immediately after waking up to avoid feeling overwhelmed and stressed.', CURRENT_TIMESTAMP),
    ('Take a cold shower', 'For a more invigorating start, consider taking a cold shower, which can increase energy and alertness.', CURRENT_TIMESTAMP);
";

mysqli_query($conn, $sql);

echo "✅ Notes inserted successfully!";
?>