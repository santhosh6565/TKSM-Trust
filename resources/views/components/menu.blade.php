<style>
    [x-cloak] {
    display: none !important;
}
</style>
<div x-cloak>
    <ul class="mt-6">
        <li class="relative px-6 py-3" @click="activeLink = 'dashboard_page'">
            <span x-show="activeLink === 'dashboard_page' || '{{ request()->routeIs('dashboard') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
            <a :class="{'text-gray-800 dark:text-white': activeLink === 'dashboard_page' || '{{ request()->routeIs('dashboard') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('dashboard') }}">
                <i class="fas fa-home w-5 h-5" aria-hidden="true"></i>
                <span class="ml-4">dashboard</span>
            </a>
        </li>
    </ul>
    
    @if (hasPermission('manage_user'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'Manage_User'">
                <span x-show="activeLink === 'Manage_User' || '{{ request()->routeIs('admin.users') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'Manage_User' || '{{ request()->routeIs('admin.users') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.users') }}">
                    <i class="fas fa-users w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Manage User</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('manage_roles'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'manage_Roles'">
                <span x-show="activeLink === 'manage_Roles' || '{{ request()->routeIs('admin.roles') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'manage_Roles' || '{{ request()->routeIs('admin.roles') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.roles') }}">
                    <i class="fas fa-user-cog w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Manage Roles</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('catergories'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'expense_categories'">
                <span x-show="activeLink === 'expense_categories' || '{{ request()->routeIs('admin.expense_categories') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'expense_categories' || '{{ request()->routeIs('admin.expense_categories') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.expense_categories') }}">
                    <i class="fas fa-wallet w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Expense Categories</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('catergories'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'income_categories'">
                <span x-show="activeLink === 'income_categories' || '{{ request()->routeIs('admin.income_categories') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'income_categories' || '{{ request()->routeIs('admin.income_categories') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.income_categories') }}">
                    <i class="fas fa-user-cog w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Income Categories</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('enroll_amount'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'enroll_income'">
                <span x-show="activeLink === 'enroll_income' || '{{ request()->routeIs('admin.income') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'enroll_income' || '{{ request()->routeIs('admin.income') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.income') }}">
                    <i class="fas fa-chart-line w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Enroll Income</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('enroll_amount'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'enroll_expenses'">
                <span x-show="activeLink === 'enroll_expenses' || '{{ request()->routeIs('admin.expense') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'enroll_expenses' || '{{ request()->routeIs('admin.expense') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.expense') }}">
                    <i class="fas fa-chart-area w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Enroll Expenses</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('monthly_report'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'monthly_Report'">
                <span x-show="activeLink === 'monthly_Report' || '{{ request()->routeIs('admin.monthlyReport') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'monthly_Report' || '{{ request()->routeIs('admin.monthlyReport') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.monthlyReport') }}">
                    <i class="fas fa-calendar w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Monthly Report</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('events'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'events'">
                <span x-show="activeLink === 'events' || '{{ request()->routeIs('admin.images.index') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'events' || '{{ request()->routeIs('admin.images.index') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.images.index') }}">
                    <i class="fas fa-calendar-alt w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Events</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('developer_control'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'developer_control'">
                <span x-show="activeLink === 'developer_control' || '{{ request()->routeIs('admin.developercontrol') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'developer_control' || '{{ request()->routeIs('admin.developercontrol') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.developercontrol') }}">
                    <i class="fas fa-code w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Developer Control</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'contact_form'">
                <span x-show="activeLink === 'contact_form' || '{{ request()->routeIs('admin.contacts.index') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'contact_form' || '{{ request()->routeIs('admin.contacts.index') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.contacts.index') }}">
                    <i class="fas fa-code w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Contact Form</span>
                </a>
            </li>
        </ul>
    @endif
    
    @if (hasPermission('Anoucement'))
        <ul>
            <li class="relative px-6 py-3" @click="activeLink = 'Anoucement'">
                <span x-show="activeLink === 'Anoucement' || '{{ request()->routeIs('admin.announcement') }}'" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                <a :class="{'text-gray-800 dark:text-white': activeLink === 'Anoucement' || '{{ request()->routeIs('admin.announcement') }}'}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-white" href="{{ route('admin.announcement') }}">
                    <i class="fas fa-bullhorn w-5 h-5" aria-hidden="true"></i>
                    <span class="ml-4">Announcement</span>
                </a>
            </li>
        </ul>
    @endif
</div>