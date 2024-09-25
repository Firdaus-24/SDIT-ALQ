<header class="header fixed top-0 z-10 left-0 right-0 flex items-stretch shrink-0 bg-[#fefefe] dark:bg-coal-500"
    data-sticky="true" data-sticky-class="shadow-sm dark:border-b dark:border-b-coal-100" data-sticky-name="header"
    id="header">
    <!-- begin: container -->
    <div class="flex items-stretch justify-between container-fixed lg:gap-4" id="header_container">
        <div class="flex items-center gap-1 -ml-1 lg:hidden">
            <a class="shrink-0" href="#">
                <img class="max-h-[25px] w-full" src="{{ asset('plugins/assets/media/app/mini-logo.svg') }}" />
            </a>
            <div class="flex items-center">
                <button class="btn btn-icon btn-light btn-clear btn-sm" data-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu">
                    </i>
                </button>
                <button class="btn btn-icon btn-light btn-clear btn-sm" data-drawer-toggle="#megamenu_wrapper">
                    <i class="ki-filled ki-burger-menu-2">
                    </i>
                </button>
            </div>
        </div>
        <div class="flex items-stretch" id="megamenu_container">
            <div class="flex items-stretch" data-reparent="true" data-reparent-mode="prepend|lg:prepend"
                data-reparent-target="body|lg:#megamenu_container">
                <div class="hidden lg:flex lg:items-stretch" data-drawer="true"
                    data-drawer-class="drawer drawer-start fixed z-10 top-0 bottom-0 w-full mr-5 max-w-[250px] p-5 lg:p-0 overflow-auto"
                    data-drawer-enable="true|lg:false" id="megamenu_wrapper">
                    <div class="menu flex-col lg:flex-row gap-5 lg:gap-7.5" data-menu="true" id="megamenu">
                        {{-- <div class="menu-item" data-menu-item-placement="bottom-start"
                            data-menu-item-toggle="accordion|lg:dropdown" data-menu-item-trigger="click|lg:hover">
                            <div
                                class="text-sm font-medium text-gray-700 menu-link menu-link-hover:text-primary menu-item-active:text-gray-900 menu-item-show:text-primary menu-item-here:text-gray-900 menu-item-active:font-semibold menu-item-here:font-semibold">
                                <span class="menu-title text-nowrap">
                                    Public Profiles
                                </span>
                                <span class="flex menu-arrow lg:hidden">
                                    <i class="ki-filled ki-plus text-2xs menu-item-show:hidden">
                                    </i>
                                    <i class="hidden ki-filled ki-minus text-2xs menu-item-show:inline-flex">
                                    </i>
                                </span>
                            </div>
                            <div class="menu-dropdown w-full gap-0 lg:max-w-[875px]">
                                <div class="pt-4 pb-2 lg:p-7.5">
                                    <div class="grid gap-5 lg:grid-cols-2 lg:gap-10">
                                        <div class="flex-col menu menu-default menu-fit">
                                            <h3
                                                class="text-sm text-gray-800 font-semibold leading-none pl-2.5 mb-2 lg:mb-5">
                                                Profiles
                                            </h3>
                                            <div class="grid lg:grid-cols-2 lg:gap-5">
                                                <div class="flex flex-col">
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/default.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-badge">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Default
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/creator.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-coffee">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Creator
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/company.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-abstract-41">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Company
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/nft.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-bitcoin">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                NFT
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/blogger.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-message-text">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Blogger
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/crm.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-devices">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                CRM
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/gamer.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-ghost">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Gamer
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/feeds.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-book">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Feeds
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/plain.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-files">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Plain
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/profiles/modal.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-mouse-square">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Modal
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-financial-schedule">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Freelancer
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-technology-4">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Developer
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-users">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Team
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-calendar-tick">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Events
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-col menu menu-default menu-fit">
                                            <h3
                                                class="text-sm text-gray-800 font-semibold leading-none pl-2.5 mb-2 lg:mb-5">
                                                Other Pages
                                            </h3>
                                            <div class="grid lg:grid-cols-2 lg:gap-5">
                                                <div class="flex flex-col">
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/projects/3-columns.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-element-6">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Projects - 3 Columns
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/projects/2-columns.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-element-4">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Projects - 2 Columns
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/works.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-office-bag">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Works
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/teams.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-people">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Teams
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/network.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-icon">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Network
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/activity.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-chart-line-up-2">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Activity
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/campaigns/card.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-element-11">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Campaigns - Card
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/campaigns/list.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-kanban">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Campaigns - List
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link"
                                                            href="html/demo1/public-profile/empty.html"
                                                            tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-file-sheet">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Empty Page
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-document">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Documents
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-award">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Badges
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="menu-item">
                                                        <a class="menu-link" href="#" tabindex="0">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-gift">
                                                                </i>
                                                            </span>
                                                            <span class="menu-title grow-0">
                                                                Awards
                                                            </span>
                                                            <span class="menu-badge">
                                                                <span class="badge badge-xs">
                                                                    Soon
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex flex-wrap items-center lg:justify-between rounded-xl lg:rounded-t-none bg-light-active dark:bg-coal-500 border border-gray-300 lg:border-0 lg:border-t lg:border-t-gray-300 dark:lg:border-t-gray-100 px-4 py-4 lg:px-7.5 lg:py-5 gap-2.5">
                                    <div class="flex flex-col gap-1.5">
                                        <div class="font-semibold leading-none text-gray-900 text-md">
                                            Read to Get Started ?
                                        </div>
                                        <div class="text-gray-600 text-2sm fomt-medium">
                                            Take your docs to the next level of Metronic
                                        </div>
                                    </div>
                                    <a class="btn btn-sm btn-dark" href="#">
                                        Read Documentation
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-2 lg:gap-3.5">
            <div class="dropdown" data-dropdown="true" data-dropdown-offset="70px, 10px"
                data-dropdown-placement="bottom-end" data-dropdown-trigger="click|lg:click">
                <button
                    class="relative text-gray-500 rounded-full cursor-pointer dropdown-toggle btn btn-icon btn-icon-lg size-9 hover:bg-primary-light hover:text-primary dropdown-open:bg-primary-light dropdown-open:text-primary">
                    <i class="ki-filled ki-notification-on">
                    </i>
                    <span
                        class="badge badge-dot badge-success size-[5px] absolute top-0.5 right-0.5 transform translate-y-1/2">
                    </span>
                </button>
                <div class="dropdown-content light:border-gray-300 w-full max-w-[460px]">
                    <div class="flex items-center justify-between gap-2.5 text-sm text-gray-900 font-semibold px-5 py-2.5"
                        id="notifications_header">
                        Notifications
                        <button class="btn btn-sm btn-icon btn-light btn-clear shrink-0" data-dropdown-dismiss="true">
                            <i class="ki-filled ki-cross">
                            </i>
                        </button>
                    </div>
                    <div class="border-b border-b-gray-200">
                    </div>
                    <div class="justify-between px-5 mb-2 tabs" data-tabs="true" id="notifications_tabs">
                        <div class="flex items-center gap-5">
                            <button class="relative tab" data-tab-toggle="#notifications_tab_inbox">
                                Inbox
                                <span
                                    class="badge badge-dot badge-success size-[5px] absolute top-2 right-0 transform translate-y-1/2 translate-x-full">
                                </span>
                            </button>
                        </div>
                        <div class="menu" data-menu="true">
                            <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-end"
                                data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:hover">
                                <button class="menu-toggle btn btn-sm btn-icon btn-light btn-clear">
                                    <i class="ki-filled ki-setting-2">
                                    </i>
                                </button>
                                <div class="menu-dropdown menu-default w-full max-w-[175px]" data-menu-dismiss="true">
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-document">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                View
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item" data-menu-item-offset="-15px, 0"
                                        data-menu-item-placement="right-start" data-menu-item-toggle="dropdown"
                                        data-menu-item-trigger="click|lg:hover">
                                        <div class="menu-link">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-notification-status">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Export
                                            </span>
                                            <span class="menu-arrow">
                                                <i class="ki-filled ki-right text-3xs">
                                                </i>
                                            </span>
                                        </div>
                                        <div class="menu-dropdown menu-default w-full max-w-[175px]">
                                            <div class="menu-item">
                                                <a class="menu-link"
                                                    href="html/demo1/account/home/settings-sidebar.html">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-sms">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Email
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link"
                                                    href="html/demo1/account/home/settings-sidebar.html">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-message-notify">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        SMS
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link"
                                                    href="html/demo1/account/home/settings-sidebar.html">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-notification-status">
                                                        </i>
                                                    </span>
                                                    <span class="menu-title">
                                                        Push
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-pencil">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Edit
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-trash">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Delete
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grow" id="notifications_tab_inbox">
                        <div class="flex flex-col">
                            <div class="scrollable-y-auto" data-scrollable="true"
                                data-scrollable-dependencies="#header" data-scrollable-max-height="auto"
                                data-scrollable-offset="200px">
                                <div class="flex flex-col gap-5 pt-3 pb-4">
                                    <div class="flex grow gap-2.5 px-5" id="notification_request_13">
                                        <div class="relative shrink-0 mt-0.5">
                                            <img alt="" class="rounded-full size-8"
                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                            <span
                                                class="size-1.5 badge badge-circle badge-success absolute top-7 end-0.5 ring-1 ring-light transform -translate-y-1/2">
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-3.5 grow">
                                            <div class="flex flex-col gap-1">
                                                <div class="mb-px font-medium text-2sm">
                                                    <a class="font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Samuel Lee
                                                    </a>
                                                    <span class="text-gray-700">
                                                        requested to add user to
                                                    </span>
                                                    <a class="font-semibold hover:text-primary-active text-primary"
                                                        href="#">
                                                        TechSynergy
                                                    </a>
                                                </div>
                                                <span class="flex items-center font-medium text-gray-500 text-2xs">
                                                    22 hours ago
                                                    <span class="badge badge-circle bg-gray-500 size-1 mx-1.5">
                                                    </span>
                                                    Dev Team
                                                </span>
                                            </div>
                                            <div
                                                class="card shadow-none flex items-center flex-row justify-between gap-1.5 px-2.5 py-2 rounded-lg bg-light-active">
                                                <div class="flex flex-col">
                                                    <a class="text-xs font-medium text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Ronald Richards
                                                    </a>
                                                    <a class="font-medium text-gray-500 hover:text-primary-active text-3xs"
                                                        href="#">
                                                        ronald.richards@gmail.com
                                                    </a>
                                                </div>
                                                <a class="text-xs font-medium text-gray-700 hover:text-primary-active"
                                                    href="#">
                                                    Go to profile
                                                </a>
                                            </div>
                                            <div class="flex flex-wrap gap-2.5">
                                                <button class="btn btn-light btn-sm"
                                                    data-dismiss="#notification_request_13">
                                                    Decline
                                                </button>
                                                <button class="btn btn-dark btn-sm"
                                                    data-dismiss="#notification_request_13">
                                                    Accept
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-b-gray-200">
                                    </div>
                                    <div class="flex items-center grow gap-2.5 px-5">
                                        <div
                                            class="flex items-center justify-center border rounded-full size-8 bg-success-light border-success-clarity">
                                            <i class="text-lg ki-filled ki-check text-success">
                                            </i>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <span class="font-medium text-gray-700 text-2sm">
                                                You have succesfully verified your account
                                            </span>
                                            <span class="font-medium text-gray-500 text-2xs">
                                                2 days ago
                                            </span>
                                        </div>
                                    </div>
                                    <div class="border-b border-b-gray-200">
                                    </div>
                                    <div class="flex grow gap-2.5 px-5">
                                        <div class="relative shrink-0 mt-0.5">
                                            <img alt="" class="rounded-full size-8"
                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                            <span
                                                class="size-1.5 badge badge-circle bg-gray-400 absolute top-7 end-0.5 ring-1 ring-light transform -translate-y-1/2">
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-3.5 grow">
                                            <div class="flex flex-col gap-1">
                                                <div class="mb-px font-medium text-2sm">
                                                    <a class="font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Ava Peterson
                                                    </a>
                                                    <span class="text-gray-700">
                                                        uploaded attachment
                                                    </span>
                                                </div>
                                                <span class="flex items-center font-medium text-gray-500 text-2xs">
                                                    3 days ago
                                                    <span class="badge badge-circle bg-gray-500 size-1 mx-1.5">
                                                    </span>
                                                    ACME
                                                </span>
                                            </div>
                                            <div
                                                class="card shadow-none flex items-center justify-between flex-row gap-1.5 p-2.5 rounded-lg bg-light-active">
                                                <div class="flex items-center gap-1.5">
                                                    <img class="h-6"
                                                        src="{{ asset('plugins/assets/media/file-types/xls.svg') }}" />
                                                    <div class="flex flex-col gap-0.5">
                                                        <a class="text-xs font-medium text-gray-700 hover:text-primary-active"
                                                            href="#">
                                                            Redesign-2024.xls
                                                        </a>
                                                        <span class="font-medium text-gray-500 text-2xs">
                                                            2.6 MB
                                                        </span>
                                                    </div>
                                                </div>
                                                <button class="btn btn-icon btn-xs btn-clear btn-light">
                                                    <svg fill="none" height="14" viewbox="0 0 14 14"
                                                        width="14" xmlns="http://www.w3.org/2000/svg">
                                                        <path clip-rule="evenodd"
                                                            d="M6.63821 2.60467C4.81926 2.60467 3.32474 3.99623 3.16201 5.77252C3.1386 6.02803 2.92413 6.22253 2.66871 6.22227C1.74915 6.22149 0.976744 6.9868 0.976744 7.90442C0.976744 8.83344 1.72988 9.58657 2.65891 9.58657H3.09302C3.36274 9.58657 3.5814 9.80523 3.5814 10.0749C3.5814 10.3447 3.36274 10.5633 3.09302 10.5633H2.65891C1.19044 10.5633 0 9.37292 0 7.90442C0 6.58614 0.986948 5.48438 2.24496 5.27965C2.62863 3.20165 4.44941 1.62793 6.63821 1.62793C8.26781 1.62793 9.69282 2.50042 10.4729 3.80193C12.3411 3.72829 14 5.2564 14 7.18091C14 8.93508 12.665 10.3769 10.9552 10.5466C10.6868 10.5733 10.4476 10.3773 10.421 10.1089C10.3943 9.84052 10.5903 9.60135 10.8587 9.57465C12.0739 9.45406 13.0233 8.42802 13.0233 7.18091C13.0233 5.74002 11.6905 4.59666 10.2728 4.79968C10.0642 4.82957 9.85672 4.72382 9.76028 4.53181C9.18608 3.38796 8.00318 2.60467 6.63821 2.60467Z"
                                                            fill="#99A1B7" fill-rule="evenodd">
                                                        </path>
                                                        <path clip-rule="evenodd"
                                                            d="M6.99909 8.01611L8.28162 9.29864C8.47235 9.48937 8.78158 9.48937 8.97231 9.29864C9.16303 9.10792 9.16303 8.79874 8.97231 8.60802L7.57465 7.2103C7.25675 6.89247 6.74143 6.89247 6.42353 7.2103L5.02585 8.60802C4.83513 8.79874 4.83513 9.10792 5.02585 9.29864C5.21657 9.48937 5.5258 9.48937 5.71649 9.29864L6.99909 8.01611Z"
                                                            fill="#99A1B7" fill-rule="evenodd">
                                                        </path>
                                                        <path clip-rule="evenodd"
                                                            d="M7.00009 12.372C7.2698 12.372 7.48846 12.1533 7.48846 11.8836V7.97665C7.48846 7.70694 7.2698 7.48828 7.00009 7.48828C6.73038 7.48828 6.51172 7.70694 6.51172 7.97665V11.8836C6.51172 12.1533 6.73038 12.372 7.00009 12.372Z"
                                                            fill="#99A1B7" fill-rule="evenodd">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-b-gray-200">
                                    </div>
                                    <div class="flex gap-2 px-5 grow">
                                        <div class="relative shrink-0 mt-0.5">
                                            <img alt="" class="rounded-full size-8"
                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                            <span
                                                class="size-1.5 badge badge-circle bg-gray-400 absolute top-7 end-0.5 ring-1 ring-light transform -translate-y-1/2">
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-3 grow">
                                            <div class="flex flex-col gap-1">
                                                <div class="mb-px font-medium text-2sm">
                                                    <a class="font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Ethan Parker
                                                    </a>
                                                    <span class="text-gray-700">
                                                        created a new tasks to
                                                    </span>
                                                    <a class="hover:text-primary-active text-primary" href="#">
                                                        Site Sculpt
                                                    </a>
                                                    <span class="text-gray-700">
                                                        project
                                                    </span>
                                                </div>
                                                <span class="flex items-center font-medium text-gray-500 text-2xs">
                                                    3 days ago
                                                    <span class="badge badge-circle bg-gray-500 size-1 mx-1.5">
                                                    </span>
                                                    Web Designer
                                                </span>
                                            </div>
                                            <div class="card shadow-none p-3.5 gap-3.5 rounded-lg bg-light-active">
                                                <div class="flex items-center justify-between flex-wrap gap-2.5">
                                                    <div class="flex flex-col gap-1">
                                                        <span class="text-xs font-medium text-gray-900">
                                                            Location history is erased after Logging In
                                                        </span>
                                                        <span class="font-medium text-gray-500 text-3xs">
                                                            Due Date: 15 May, 2024
                                                        </span>
                                                    </div>
                                                    <div class="flex -space-x-2">
                                                        <div class="flex">
                                                            <img class="relative rounded-full hover:z-5 shrink-0 ring-1 ring-light-light size-6"
                                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                        </div>
                                                        <div class="flex">
                                                            <img class="relative rounded-full hover:z-5 shrink-0 ring-1 ring-light-light size-6"
                                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2.5">
                                                    <span class="badge badge-sm badge-success badge-outline">
                                                        Improvement
                                                    </span>
                                                    <span class="badge badge-sm badge-danger badge-outline">
                                                        Bug
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-b-gray-200">
                                    </div>
                                    <div class="flex grow gap-2.5 px-5" id="notification_request_3">
                                        <div class="relative shrink-0 mt-0.5">
                                            <img alt="" class="rounded-full size-8"
                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                            <span
                                                class="size-1.5 badge badge-circle bg-gray-400 absolute top-7 end-0.5 ring-1 ring-light transform -translate-y-1/2">
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-3.5">
                                            <div class="flex flex-col gap-1">
                                                <div class="mb-px font-medium text-2sm">
                                                    <a class="font-semibold text-gray-900 hover:text-primary-active"
                                                        href="#">
                                                        Benjamin Harris
                                                    </a>
                                                    <span class="text-gray-700">
                                                        requested to upgrade plan
                                                    </span>
                                                    <a class="hover:text-primary-active text-primary" href="#">
                                                    </a>
                                                    <span class="text-gray-700">
                                                    </span>
                                                </div>
                                                <span class="flex items-center font-medium text-gray-500 text-2xs">
                                                    4 days ago
                                                    <span class="badge badge-circle bg-gray-500 size-1 mx-1.5">
                                                    </span>
                                                    Marketing
                                                </span>
                                            </div>
                                            <div class="flex flex-wrap gap-2.5">
                                                <button class="btn btn-light btn-sm"
                                                    data-dismiss="#notification_request_3">
                                                    Decline
                                                </button>
                                                <button class="btn btn-dark btn-sm"
                                                    data-dismiss="#notification_request_3">
                                                    Accept
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-b-gray-200">
                                    </div>
                                    <div class="flex grow gap-2.5 px-5">
                                        <div class="relative shrink-0 mt-0.5">
                                            <img alt="" class="rounded-full size-8"
                                                src="{{ asset('assets/images/nophoto.jpg') }}" />
                                            <span
                                                class="size-1.5 badge badge-circle badge-success absolute top-7 end-0.5 ring-1 ring-light transform -translate-y-1/2">
                                            </span>
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <div class="mb-px font-medium text-2sm">
                                                <a class="font-semibold text-gray-900 hover:text-primary-active"
                                                    href="#">
                                                    Isaac Morgan
                                                </a>
                                                <span class="text-gray-700">
                                                    mentioned you in
                                                </span>
                                                <a class="hover:text-primary-active text-primary" href="#">
                                                    Data Transmission
                                                </a>
                                                topic
                                            </div>
                                            <span class="flex items-center font-medium text-gray-500 text-2xs">
                                                6 days ago
                                                <span class="badge badge-circle bg-gray-500 size-1 mx-1.5">
                                                </span>
                                                Dev Team
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-b-gray-200">
                            </div>
                            <div class="grid grid-cols-2 p-5 gap-2.5" id="notifications_inbox_footer">
                                <button class="justify-center btn btn-sm btn-light">
                                    Archive all
                                </button>
                                <button class="justify-center btn btn-sm btn-light">
                                    Mark all as read
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu" data-menu="true">
                <div class="menu-item" data-menu-item-offset="20px, 10px" data-menu-item-placement="bottom-end"
                    data-menu-item-toggle="dropdown" data-menu-item-trigger="click|lg:click">
                    <div class="rounded-full menu-toggle btn btn-icon">
                        <img alt="" class="border-2 rounded-full size-9 border-success shrink-0"
                            src="{{ asset('assets/images/nophoto.jpg') }}">
                        </img>
                    </div>
                    <div class="menu-dropdown menu-default light:border-gray-300 w-full max-w-[250px]">
                        <div class="flex items-center justify-between px-5 py-1.5 gap-1.5">
                            <div class="flex items-center gap-2">
                                <img alt="" class="border-2 rounded-full size-9 border-success"
                                    src="{{ asset('assets/images/nophoto.jpg') }}">
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-sm font-semibold leading-none text-gray-800">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <a class="text-xs font-medium leading-none text-gray-600 hover:text-primary"
                                        href="#">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                                </img>
                            </div>
                            <span class="badge badge-xs badge-primary badge-outline">
                                Pro
                            </span>
                        </div>
                        <div class="menu-separator">
                        </div>
                        <div class="flex flex-col" data-menu-dismiss="true">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-badge">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Public Profile
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('profile.edit') }}">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-profile-circle">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        My Profile
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item" data-menu-item-offset="-50px, 0"
                                data-menu-item-placement="left-start" data-menu-item-toggle="dropdown"
                                data-menu-item-trigger="click|lg:hover">
                                <div class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-setting-2">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        My Account
                                    </span>
                                    <span class="menu-arrow">
                                        <i class="ki-filled ki-right text-3xs">
                                        </i>
                                    </span>
                                </div>
                                <div class="menu-dropdown menu-default light:border-gray-300 w-full max-w-[220px]">
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-coffee">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Get Started
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-some-files">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                My Profile
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-icon">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Billing
                                            </span>
                                            <span class="menu-badge" data-tooltip="true"
                                                data-tooltip-placement="top">
                                                <i class="text-gray-500 ki-filled ki-information-2 text-md">
                                                </i>
                                                <span class="tooltip" data-tooltip-content="true">
                                                    Payment and subscription info
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="html/demo1/account/security/overview.html">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-medal-star">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Security
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="html/demo1/account/members/teams.html">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-setting">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Members &amp; Roles
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="html/demo1/account/integrations.html">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-switch">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Integrations
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-separator">
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="html/demo1/account/security/overview.html">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-shield-tick">
                                                </i>
                                            </span>
                                            <span class="menu-title">
                                                Notifications
                                            </span>
                                            <label class="switch switch-sm">
                                                <input checked="" name="check" type="checkbox" value="1">
                                                </input>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-separator">
                        </div>
                        <div class="flex flex-col">
                            <div class="menu-item mb-0.5">
                                <div class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-moon">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Dark Mode
                                    </span>
                                    <label class="switch switch-sm">
                                        <input data-theme-state="dark" data-theme-toggle="true" name="check"
                                            type="checkbox" value="1">
                                        </input>
                                    </label>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="post">
                                <div class="menu-item px-4 py-1.5">
                                    @csrf
                                    <button type="submit" class="justify-center btn btn-sm btn-light">
                                        <span class="grow">Logout</span>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: container -->
</header>
