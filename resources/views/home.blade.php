@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->check() && auth()->user()->id)
                        <small style="margin: 13px"> Vous êtes connecté, {{auth()->user()->name}}</small>
                        @else
                    @endif


                @if (auth()->user()->roles()->first()->id == 2)
                <main class="container">
                <div class="row mb-3">
                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Entrant
                                <hr class="bg-info">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#52cbf0"></rect></svg>
                                    <small>20 opportunités</small>
                                </div>
                            </h6>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Gagné
                                <hr class="bg-success"> <br> <br>

                                <div class="d-flex justify-content-between">
                                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#3D8854"></rect></svg>
                                    <small>15 opportunités</small>
                                </div>
                            </h6>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                À rappeler
                                <hr class="bg-warning">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#F9C132"></rect></svg>
                                    <small>10 opportunités</small>
                                </div>
                            </h6>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Perdu
                                <hr class="bg-danger">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#DC4245"></rect></svg>
                                    <small>5 opportunités</small>
                                </div>
                            </h6>
                        </div>
                    </div>
                </div>
            </main>
              @else
   <main class="container">
                <div class="row mb-3">
                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Entrant
                                <hr class="bg-info">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <small>20 opportunités</small>
                                </div>
                            </h6>

                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#52cbf0"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                    <span class="d-block">juniorpecpec@gmail.com</span>
                                    <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#52cbf0"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                    <span class="d-block">juniorpecpec@gmail.com</span>
                                    <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#52cbf0"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                    <span class="d-block">juniorpecpec@gmail.com</span>
                                    <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>

                            <small class="d-block text-end mt-3">
                                <a href="">Propects à faire</a>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Gagné
                                <hr class="bg-success"> <br> <br>

                                <div class="d-flex justify-content-between">
                                    <small>15 opportunités</small>
                                </div>
                            </h6>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#3D8854"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#3D8854"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#3D8854"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <small class="d-block text-end mt-3">
                                <a href="">Propects gagné</a>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                À rappeler
                                <hr class="bg-warning">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <small>10 opportunités</small>
                                </div>
                            </h6>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#F9C132"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#F9C132"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#F9C132"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <small class="d-block text-end mt-3">
                                <a href="">Propects à rappeler</a>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-3 themed-grid-col">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            <h6 class="border-bottom pb-2 mb-0">
                                Perdu
                                <hr class="bg-danger">
                                <br>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <small>5 opportunités</small>
                                </div>
                            </h6>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#DC4245"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#DC4245"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex text-muted pt-3">
                                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="20" height="20" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"> <rect width="100%" height="100%" fill="#DC4245"></rect></svg>
                                <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Junior PECPEC</strong>
                                    </div>
                                    <div>
                                        <span class="d-block">juniorpecpec@gmail.com</span>
                                        <span class="d-block">0102030405</span>
                                    </div>
                                </div>
                            </div>
                            <small class="d-block text-end mt-3">
                                <a href="">Propects perdus</a>
                            </small>
                        </div>
                    </div>
                </div>
            </main>

            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
