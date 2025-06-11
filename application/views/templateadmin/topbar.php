<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <header class="page-header row">
        <div class="logo-wrapper d-flex align-items-center col-auto"><a href="#"><img class="light-logo img-fluid" src="<?= base_url('assets/') ?>img/logotopbar.png" alt="logo" style="width: 91px;, height: 27px" /><img class="dark-logo img-fluid" src="<?= base_url('assets/') ?>img/logotopbar.png" alt="logo" style="width: 91px;, height: 27px" /></a><a class="close-btn toggle-sidebar" href="javascript:void(0)">

                <svg class="svg-color">
                    <use href="<?= base_url('assets/') ?>admin/svg/iconly-sprite.svg#Category"></use>
                </svg></a></div>
        <div class="page-main-header col">
            <div class="header-left">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Attendance .." name="q" title="" autofocus="autofocus" />
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="form-group-header d-lg-block d-none">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative d-flex align-items-center">
                            <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text" placeholder="Type to Search..." name="q" title="" /><i class="search-bg iconly-Search icli"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-right">
                <ul class="header-right">


                    <li class="search d-lg-none d-flex"> <a href="javascript:void(0)">
                            <svg>
                                <use href="<?= base_url('assets/') ?>admin/svg/iconly-sprite.svg#Search"></use>
                            </svg></a></li>


                    <li> <a class="dark-mode" href="javascript:void(0)">
                            <svg>
                                <use href="<?= base_url('assets/') ?>admin/svg/iconly-sprite.svg#moondark"></use>
                            </svg></a></li>

                    <li><a class="full-screen" href="javascript:void(0)">
                            <svg>
                                <use href="<?= base_url('assets/') ?>admin/svg/iconly-sprite.svg#scanfull"></use>
                            </svg></a></li>

                    <li class="profile-nav custom-dropdown">
                        <div class="user-wrap">
                            <div class="user-img"><img src="<?= base_url('assets/') ?>img/default.png" alt="user" /></div>
                            <div class="user-content">
                                <h6><?php echo $user['nama'] ?></h6>
                                <p class="mb-0"><?php
                                                if ($user['level'] == 1) {
                                                    echo 'Admin';
                                                } else if ($user['level'] == 2) {
                                                    echo 'User';
                                                }
                                                ?><i class="fa-solid fa-chevron-down"></i></p>
                            </div>
                        </div>
                        <div class="custom-menu overflow-hidden">
                            <ul class="profile-body">


                                <svg class="svg-color">
                                    <use href="<?= base_url('assets/') ?>admin/svg/iconly-sprite.svg#Login"></use>
                                </svg><a class="ms-2" href="<?= base_url('logout') ?>">Log Out</a>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>