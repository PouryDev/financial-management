<?php

namespace App\Traits;

trait HasAlert
{
    protected array $icons = [
        'success' => ['success', 'green'],
        'error' => ['error', 'red'],
        'warning' => ['warning', 'yellow'],
        'info' => ['info', 'blue'],
    ];

    /**
     * Show alert in component
     *
     * @param string $title
     * @param string $icon
     * @return void
     */
    protected function showAlert(string $title, string $icon): void
    {
        if (!isset($this->icons[$icon])) {
            $icon = $this->icons['success'];
        }

        $icon = $this->icons[$icon];
        $this->dispatch('updated', [
            'title' => $title,
            'icon' => $icon[0],
            'iconColor' => $iconColor ?? $icon[1],
        ]);
    }
}
