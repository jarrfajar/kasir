<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo.png')">

    <!-- Add Sidebar Menu Items Here -->

    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Buku Tamu" :link="route('tamu')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Check In" :link="route('check-in')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Check Out" :link="route('check-out')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Tamu In-House" :link="route('tamu-in-house')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Kamar" :link="route('kamar')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Tipe Kamar" :link="route('tipe-kamar')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @role('admin')
        <x-maz-sidebar-item name="User" :link="route('userC')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @endrole
    @role('owner|admin')
        <x-maz-sidebar-item name="Laporan" :link="route('laporan')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    @endrole
    
</x-maz-sidebar>