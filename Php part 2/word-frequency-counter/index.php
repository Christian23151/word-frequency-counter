<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        function tokenizeText(string $text): array {
            $text = strtolower($text);
            $text = preg_replace('/[^a-z0-9 ]/', '', $text);
            $words = explode(' ', $text);
            return array_filter($words, fn($word) => !empty($word));
        }

        function calculateWordFrequency(array $words, array $stopWords = []): array {
            $filteredWords = array_diff($words, $stopWords);
            return array_count_values($filteredWords);
        }

        function sortWordFrequency(array $wordFrequencies, string $order): array {
            if ($order === 'desc') {
                arsort($wordFrequencies);
            } else {
                asort($wordFrequencies);
            }
            return $wordFrequencies;
        }

        $stopWords = ["the", "and", "in", "on", "at", "to", "a", "is", "of", "that", "this"];

        $text = $_POST['text'] ?? '';
        $sortOrder = $_POST['sort'] ?? 'desc';
        $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10;

        if (empty(trim($text))) {
            echo "<p style='color:red;'>Error: No text provided!</p>";
            exit;
        }

        $words = tokenizeText($text);
        $wordFrequencies = calculateWordFrequency($words, $stopWords);
        $sortedFrequencies = sortWordFrequency($wordFrequencies, $sortOrder);
        $topWords = array_slice($sortedFrequencies, 0, $limit, true);

        echo "<h2>Word Frequency Result</h2><ul>";
        foreach ($topWords as $word => $count) {
            echo "<li>{$word}: {$count}</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
