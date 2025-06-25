import 'flowbite';
import './bootstrap';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

import flatpickr from "flatpickr"; 
import Swal from 'sweetalert2';

window.addEventListener('DOMContentLoaded', () => {
    Livewire.on('confirmDelete', (data) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete', data);
            }
        });
    });

    window.addEventListener('swal:deleted', () => {
        Swal.fire(
            'Deleted!',
            'The record has been deleted.',
            'success'
        );
    });
});