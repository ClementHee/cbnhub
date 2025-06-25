<?php

namespace App\Traits;

trait WithSweetAlertConfirmation
{
    public function confirmDelete($id, $message = "You won't be able to revert this!")
    {
        $this->dispatch('confirmDelete', [
            'id' => $id,
            'message' => $message
        ]);
    }

    public function confirmAction($event, $params = [], $title = 'Are you sure?', $message = 'This action cannot be undone!')
    {
        $this->dispatch('confirmAction', [
            'title' => $title,
            'message' => $message,
            'event' => $event,
            'params' => $params
        ]);
    }

    public function showSuccess($message)
    {
        $this->dispatch('showMessage', $message, 'success');
    }

    public function showError($message)
    {
        $this->dispatch('showMessage', $message, 'error');
    }
}