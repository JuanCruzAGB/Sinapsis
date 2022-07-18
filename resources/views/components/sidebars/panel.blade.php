<section id="panel-sidebar" class="tabs sidebar left opened">
    <main class="tab-body sidebar-body">
        <header class="tab-header sidebar-header">
            <a href="/home" class="sidebar-title">
                <img src="{{ asset('img/resources/logo/01-white.png') }}" 
                    alt="Path Logo"/>

                <h2 class="hidden">Path</h2>
            </a>

            <a href="#_" class="sidebar-button panel-sidebar close left hidden">
                <i class="fas fa-times"></i>
            </a>
        </header>
        
        <section class="tab-content sidebar-content">
            <ul class="tab-menu-list sidebar-menu-list">
                @switch(Auth::user()->id_role)
                    @case(1)
                        <li class="tab">
                            <a href="/users/corrector/list" class="btn btn-transparent btn-white montserrat">
                                <span>Correctors</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/users/associated/list" class="btn btn-transparent btn-white montserrat">
                                <span>Associates</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/users/candidate/list" class="btn btn-transparent btn-white montserrat">
                                <span>Candidates</span>
                            </a>
                        </li>
                        @break
                    @case(3)
                        <li class="tab">
                            <a href="/dashboard" class="btn btn-transparent btn-white montserrat">
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if ($role == 'administrator' && array_search(Auth::user()->id_user, [ 1, 2, ]) !== false)
                            <li class="tab">
                                <a href="/users/administrator/list" class="btn btn-transparent btn-white montserrat">
                                    <span>Administrators</span>
                                </a>
                            </li>
                        @endif

                        <li class="tab">
                            <a href="/users/corrector/list" class="btn btn-transparent btn-white montserrat">
                                <span>Correctors</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/users/associated/list" class="btn btn-transparent btn-white montserrat">
                                <span>Associates</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/users/candidate/list" class="btn btn-transparent btn-white montserrat">
                                <span>Candidates</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/exam/list" class="btn btn-transparent btn-white montserrat">
                                <span>Exams</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/evaluations/list" class="btn btn-transparent btn-white montserrat">
                                <span>Evaluations</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="/cart" class="btn btn-transparent btn-white montserrat">
                                <span>Payments</span>
                            </a>
                        </li>

                        <li class="tab">
                            <a href="#" class="btn btn-transparent btn-white montserrat">
                                <span>Documents</span>
                            </a>
                        </li>
                        @break
                @endswitch
            </ul>
        </section>

        <footer class="sidebar-footer">
            <ul class="sidebar-footer-menu-list">
                <li>
                    <a href="/logout" class="btn btn-transparent btn-white btn-borderless montserrat">
                        <span>Log out</span>
                    </a>
                </li>
            </ul>
        </footer>
    </main>
</section>