<?php
header('Content-Type: application/json');

// Read movies from JSON file
function getMovies() {
    try {
        $jsonContent = file_get_contents('data/movie.json');
        if ($jsonContent === false) {
            throw new Exception('Unable to read movies data');
        }
        
        $data = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON format');
        }
        
        return $data['movies'] ?? [];
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}

// Get tags from POST request
$requestHead = isset($_POST['head']) ? json_decode($_POST['head'], true) : [];
$movies = getMovies();

if (empty($requestTags)) {
    echo json_encode($movies);
} else {
    // Filter movies by tags
    $filteredMovies = array_filter($movies, function($movie) use ($requestHead) {
        if (!isset($movie['head']) || !is_array($movie['head'])) {
            return false;
        }
        $movieHead = array_map('strtolower', $movie['head']);
        $requestHead = array_map('strtolower', $requestHead);
        return count(array_intersect($requestHead, $movieHead)) === count($requestHead);
    });
    
    echo json_encode(array_values($filteredMovies));
}
?>
