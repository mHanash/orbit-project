<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-white">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <h4>Options : </h4>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-primary h-100">
                    <a href="#" class="text-decoration-none text-center hover">
                        <div class="card-body">
                            <h5 class="card-title  text-white">Rechercher le vol</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-primary h-100">
                    <a href="#" class="text-decoration-none text-center">
                        <div class="card-body">
                            <h5 class="card-title text-white">Vols disponible</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-primary h-100">
                    <a href="#" class="text-decoration-none text-center">
                        <div class="card-body">
                            <h5 class="card-title text-white">Compagnies aériennes</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-primary h-100">
                    <a href="#" class="text-decoration-none text-center">
                        <div class="card-body">
                            <h5 class="card-title text-white">Types d'avion</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>