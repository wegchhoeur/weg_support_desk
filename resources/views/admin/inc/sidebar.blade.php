<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ URL::route('dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Articles </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ URL::route('article.index') }}">Article List</a>
                    <a href="{{ URL::route('article-category.index') }}">Article Category</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> FAQs </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ URL::route('faq.index') }}">FAQ List</a>
                    <a href="{{ URL::route('faq-category.index') }}">FAQ Category</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('video.index') }}">
                <span class="icon"><i class="fab fa-youtube"></i></span>
                <span> Videos </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('contact.index') }}">
                <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
                <span> Emails </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('livechat.index') }}">
                <span class="icon"><i class="fas fa-comment-alt"></i></span>
                <span> Live Chat </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('page-setup.index') }}">
                <span class="icon"><i class="fas fa-file"></i></span>
                <span> Page Setup </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-language"></i></span>
                <span> Languages </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ URL::route('language.index') }}">Language Setup</a>
                    <a href="{{ URL('admin/translation') }}" target="_blank">Translations</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Settings </span>
            </a>
        </li>

    </ul>

</div>
<!-- End Sidebar -->