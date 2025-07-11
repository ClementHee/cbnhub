import 'flowbite';
import './bootstrap';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

import flatpickr from "flatpickr"; 
import Swal from 'sweetalert2';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.css';

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

    window.addEventListener('swal:created', event => {
    const { message, redirectUrl } = event.detail[0];
console.log('SWAL event data:', event.detail[0]);
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: message,
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true
    }).then(() => {
        console.log('Redirecting to:', redirectUrl);
        window.location.href = redirectUrl;
    });
});
});