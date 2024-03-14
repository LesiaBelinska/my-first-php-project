<?php

class View
{
    public function render(string $path, array $variables = []): bool
    {
        $filePath = VIEWS_DIR . $path;
        if (!file_exists($filePath)) {
            throw new Exception('View file not found');
        }

        if ($variables) {
            extract($variables);
        }

        ob_start();

        require $filePath;

        echo ob_get_clean();

        return true;
    }
}