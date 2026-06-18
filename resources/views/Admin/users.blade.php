@extends('layouts.admin')

@section('title', 'Users Management | LiverCare AI Dashboard')

@section('sidebar-extra')
    <p class="text-xs text-slate-500 mb-2">User Management</p>
    <button id="addUserBtn" class="w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 justify-center hover:bg-accent-teal/20 transition-colors">
        <span class="material-symbols-outlined text-sm">person_add</span>
        Add New User
    </button>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div><h1 class="text-3xl font-display font-bold text-white mb-2">User Management</h1><p class="text-slate-400">Manage all users, roles, permissions, and access controls</p></div>
            <div class="flex items-center gap-3">
                <div class="relative"><input type="text" id="searchUsers" placeholder="Search users..." class="pl-10 pr-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"><span class="material-symbols-outlined text-sm">search</span></span></div>
                <button id="exportUsers" class="px-4 py-2 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 hover:bg-accent-teal/20"><span class="material-symbols-outlined text-sm">download</span> Export</button>
            </div>
        </div>
    </div>

    <!-- User Stats -->
    <div class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">Total Users</p><h3 class="text-3xl font-bold text-white mt-2" id="totalUsersCount">{{ $totalUsers ?? 1842 }}</h3></div><div class="w-12 h-12 rounded-xl bg-accent-teal/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">group</span></div></div>
                <div class="mt-4"><div class="flex justify-between text-sm text-slate-400 mb-1"><span>Active Users</span><span class="font-bold text-success" id="activeUsersCount">{{ $activeUsers ?? 1728 }}</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div id="activeProgress" class="h-full bg-success rounded-full" style="width: {{ $activeUsersPercent ?? 94 }}%"></div></div></div>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start mb-4"><div><p class="text-sm text-slate-400">User Roles</p><h3 class="text-3xl font-bold text-white mt-2">4</h3></div><div class="w-12 h-12 rounded-xl bg-accent-blue/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">badge</span></div></div>
                <div class="space-y-2"><div class="flex justify-between"><span class="text-sm text-slate-400">Physicians</span><span class="text-sm font-bold text-accent-teal" id="physiciansCount">{{ $physicians ?? 842 }}</span></div><div class="flex justify-between"><span class="text-sm text-slate-400">Researchers</span><span class="text-sm font-bold text-accent-blue" id="researchersCount">{{ $researchers ?? 368 }}</span></div></div>
            </div>
            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex justify-between items-start mb-4"><div><p class="text-sm text-slate-400">New This Month</p><h3 class="text-3xl font-bold text-white mt-2" id="newUsersCount">{{ $newUsersThisMonth ?? 142 }}</h3></div><div class="w-12 h-12 rounded-xl bg-success/10 flex items-center justify-center"><span class="material-symbols-outlined text-success">person_add</span></div></div>
                <div class="flex items-center gap-2"><span class="text-sm text-success flex items-center gap-1"><span class="material-symbols-outlined text-sm">trending_up</span> +12.5%</span><span class="text-sm text-slate-400">vs last month</span></div>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">Pending Verification</p><h3 class="text-3xl font-bold text-white mt-2" id="pendingUsersCount">{{ $pendingUsers ?? 24 }}</h3></div><div class="w-12 h-12 rounded-xl bg-warning/10 flex items-center justify-center"><span class="material-symbols-outlined text-warning">pending</span></div></div>
                <div class="mt-4"><button id="reviewPendingBtn" class="w-full py-2 bg-warning/10 text-warning rounded-xl text-sm hover:bg-warning/20">Review Now</button></div>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="mb-8">
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div><h3 class="text-xl font-bold text-white mb-1">All Users</h3><p class="text-sm text-slate-400" id="usersCountDisplay">Loading users...</p></div>
                <div class="flex items-center gap-3">
                    <select id="filterRole" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="all">All Roles</option><option value="physician">Physicians</option><option value="researcher">Researchers</option><option value="admin">Administrators</option><option value="student">Medical Students</option></select>
                    <select id="filterStatus" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="all">All Status</option><option value="active">Active</option><option value="pending">Pending</option><option value="inactive">Inactive</option></select>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="user-table w-full">
                    <thead class="bg-white/5 border-b border-white/10">
                        <tr>
                            <th class="w-12 p-4"><input type="checkbox" id="selectAll" class="rounded border-white/20"></th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">User</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Role</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Institution</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Cases</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Status</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Last Active</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody"></tbody>
                </table>
            </div>
            <div class="p-6 border-t border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex items-center gap-3">
                    <button id="bulkActionBtn" class="px-4 py-2 bg-white/5 text-white rounded-xl text-sm hover:bg-white/10">Bulk Actions</button>
                    <select id="bulkActionSelect" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="">Select Action</option><option value="activate">Activate Users</option><option value="deactivate">Deactivate Users</option><option value="delete">Delete Users</option><option value="export">Export Selected</option></select>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-400">Rows per page</span>
                    <select id="rowsPerPage" class="px-3 py-1 bg-deep-navy/50 border border-white/10 rounded-lg text-white text-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option></select>
                    <div class="flex items-center gap-2">
                        <button id="prevPage" class="p-2 text-slate-400 hover:text-white disabled:opacity-50"><span class="material-symbols-outlined">chevron_left</span></button>
                        <span class="text-sm text-white" id="currentPage">1</span>
                        <span class="text-sm text-slate-400">of</span>
                        <span class="text-sm text-slate-400" id="totalPages">1</span>
                        <button id="nextPage" class="p-2 text-slate-400 hover:text-white"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">User Activity</h3><div class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Last 30 days</div></div>
            <div class="space-y-4">
                <div><div class="flex justify-between"><span class="text-slate-300">Daily Active Users</span><span class="font-bold text-accent-teal" id="dailyActive">824</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden mt-1"><div class="h-full bg-accent-teal rounded-full" style="width:82%"></div></div></div>
                <div><div class="flex justify-between"><span class="text-slate-300">Weekly Active Users</span><span class="font-bold text-accent-blue" id="weeklyActive">1,428</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden mt-1"><div class="h-full bg-accent-blue rounded-full" style="width:71%"></div></div></div>
                <div><div class="flex justify-between"><span class="text-slate-300">Monthly Active Users</span><span class="font-bold text-success" id="monthlyActive">1,728</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden mt-1"><div class="h-full bg-success rounded-full" style="width:86%"></div></div></div>
            </div>
        </div>
        <div class="glass-card p-6 rounded-2xl neon-border">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Role Distribution</h3><button class="text-sm text-accent-teal hover:text-accent-teal/80">View Details</button></div>
            <div class="space-y-4">
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300 flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-accent-teal"></div> Physicians</span><span class="font-bold text-white" id="rolePhysicians">842 (45.7%)</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-accent-teal rounded-full" style="width:45.7%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300 flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-accent-blue"></div> Researchers</span><span class="font-bold text-white" id="roleResearchers">368 (20.0%)</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-accent-blue rounded-full" style="width:20%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300 flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-warning"></div> Administrators</span><span class="font-bold text-white" id="roleAdmins">42 (2.3%)</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-warning rounded-full" style="width:2.3%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300 flex items-center gap-2"><div class="w-3 h-3 rounded-full bg-success"></div> Medical Students</span><span class="font-bold text-white" id="roleStudents">590 (32.0%)</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-success rounded-full" style="width:32%"></div></div></div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4">
    <div class="glass-card rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-white/10 flex justify-between items-center"><h3 class="text-xl font-bold text-white">Add New User</h3><button id="closeAddUserModal" class="text-slate-400 hover:text-white"><span class="material-symbols-outlined">close</span></button></div>
        <form id="addUserForm" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div><label class="block text-sm font-medium text-slate-300 mb-2">First Name</label><input type="text" id="newFirstName" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="John" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Last Name</label><input type="text" id="newLastName" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Doe" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Email Address</label><input type="email" id="newEmail" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="john.doe@hospital.org" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Role</label><select id="newRole" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="physician">Physician</option><option value="researcher">Researcher</option><option value="admin">Administrator</option><option value="student">Medical Student</option></select></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Institution</label><input type="text" id="newInstitution" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Hospital Name" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Country</label><select id="newCountry" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="US">United States</option><option value="UK">United Kingdom</option><option value="CA">Canada</option><option value="EG">Egypt</option></select></div>
            </div>
            <div class="flex justify-end gap-4"><button type="button" id="cancelAddUser" class="px-6 py-3 bg-white/5 text-white rounded-xl hover:bg-white/10">Cancel</button><button type="submit" class="px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl hover:bg-accent-teal/90">Add User</button></div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let allUsers = @json($users ?? []);
    if (allUsers.length === 0) {
        allUsers = [
            { id:1, name:"Dr. Ahmed Mohamed", email:"ahmed@medical.org", role:"physician", institution:"Cairo Hospital", cases:142, status:"active", lastActive:"2 hours ago" },
            { id:2, name:"Dr. Sarah Chen", email:"sarah@research.edu", role:"researcher", institution:"Stanford", cases:89, status:"active", lastActive:"Just now" },
            { id:3, name:"Alex Johnson", email:"alex@student.edu", role:"student", institution:"Harvard", cases:24, status:"active", lastActive:"1 day ago" },
            { id:4, name:"Dr. Maria Rodriguez", email:"maria@hospital.es", role:"physician", institution:"Madrid General", cases:217, status:"pending", lastActive:"Never" },
            { id:5, name:"Admin User", email:"admin@livercare.ai", role:"admin", institution:"LiverCare AI", cases:0, status:"active", lastActive:"Just now" }
        ];
    }
    let filteredUsers = [...allUsers];
    let currentPage = 1;
    let rowsPerPage = 10;

    function renderTable() {
        const tbody = document.getElementById('usersTableBody');
        const start = (currentPage - 1) * rowsPerPage;
        const paginated = filteredUsers.slice(start, start + rowsPerPage);
        tbody.innerHTML = '';
        paginated.forEach(u => {
            let roleClass = 'role-physician', roleText = 'Physician';
            if (u.role === 'researcher') { roleClass = 'role-researcher'; roleText = 'Researcher'; }
            else if (u.role === 'admin') { roleClass = 'role-admin'; roleText = 'Admin'; }
            else if (u.role === 'student') { roleClass = 'role-student'; roleText = 'Student'; }
            let statusClass = 'status-active', statusText = 'Active';
            if (u.status === 'pending') { statusClass = 'status-pending'; statusText = 'Pending'; }
            else if (u.status === 'inactive') { statusClass = 'status-inactive'; statusText = 'Inactive'; }
            const row = `<tr class="border-b border-white/10 hover:bg-white/5">
                <td class="p-4"><input type="checkbox" class="user-checkbox rounded border-white/20" data-user-id="${u.id}"></td>
                <td class="p-4"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-gradient-to-r from-accent-teal/20 to-accent-blue/20 flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">person</span></div><div><p class="font-medium text-white">${u.name}</p><p class="text-sm text-slate-400">${u.email}</p></div></div></td>
                <td class="p-4"><span class="role-badge ${roleClass}">${roleText}</span></td>
                <td class="p-4 text-slate-300">${u.institution}</td>
                <td class="p-4"><div class="flex items-center gap-2"><span class="font-bold text-white">${u.cases}</span><span class="text-xs text-slate-400">cases</span></div></td>
                <td class="p-4"><span class="role-badge ${statusClass}">${statusText}</span></td>
                <td class="p-4 text-slate-400">${u.lastActive}</td>
                <td class="p-4"><div class="flex gap-2"><button class="action-btn text-accent-teal edit-user" data-user-id="${u.id}"><span class="material-symbols-outlined text-sm">edit</span></button><button class="action-btn text-accent-blue view-user" data-user-id="${u.id}"><span class="material-symbols-outlined text-sm">visibility</span></button><button class="action-btn text-danger delete-user" data-user-id="${u.id}"><span class="material-symbols-outlined text-sm">delete</span></button></div></td>
            </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });
        document.getElementById('usersCountDisplay').innerText = `Showing ${filteredUsers.length} users`;
        const totalPages = Math.ceil(filteredUsers.length / rowsPerPage);
        document.getElementById('totalPages').innerText = totalPages || 1;
        document.getElementById('currentPage').innerText = currentPage;
        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage === totalPages || totalPages === 0;
        attachUserButtons();
        updateStatsDisplay();
    }

    function attachUserButtons() {
        document.querySelectorAll('.edit-user').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.userId; showNotification(`Editing user ${id}`, 'info'); }));
        document.querySelectorAll('.view-user').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.userId; showNotification(`Viewing user ${id}`, 'info'); }));
        document.querySelectorAll('.delete-user').forEach(btn => btn.addEventListener('click', (e) => { const id = parseInt(btn.dataset.userId); if (confirm('Delete user?')) { allUsers = allUsers.filter(u => u.id !== id); filteredUsers = [...allUsers]; renderTable(); updateStats(); showNotification('User deleted', 'success'); } }));
    }

    function filterUsers() {
        const role = document.getElementById('filterRole').value;
        const status = document.getElementById('filterStatus').value;
        const search = document.getElementById('searchUsers').value.toLowerCase();
        filteredUsers = allUsers.filter(u => {
            if (role !== 'all' && u.role !== role) return false;
            if (status !== 'all' && u.status !== status) return false;
            if (search && !u.name.toLowerCase().includes(search) && !u.email.toLowerCase().includes(search)) return false;
            return true;
        });
        currentPage = 1;
        renderTable();
    }

    function updateStats() {
        const total = allUsers.length;
        const active = allUsers.filter(u => u.status === 'active').length;
        const pending = allUsers.filter(u => u.status === 'pending').length;
        const physicians = allUsers.filter(u => u.role === 'physician').length;
        const researchers = allUsers.filter(u => u.role === 'researcher').length;
        const admins = allUsers.filter(u => u.role === 'admin').length;
        const students = allUsers.filter(u => u.role === 'student').length;
        document.getElementById('totalUsersCount').innerText = total;
        document.getElementById('activeUsersCount').innerText = active;
        document.getElementById('pendingUsersCount').innerText = pending;
        document.getElementById('physiciansCount').innerText = physicians;
        document.getElementById('researchersCount').innerText = researchers;
        document.getElementById('rolePhysicians').innerText = `${physicians} (${total ? Math.round(physicians/total*100) : 0}%)`;
        document.getElementById('roleResearchers').innerText = `${researchers} (${total ? Math.round(researchers/total*100) : 0}%)`;
        document.getElementById('roleAdmins').innerText = `${admins} (${total ? Math.round(admins/total*100) : 0}%)`;
        document.getElementById('roleStudents').innerText = `${students} (${total ? Math.round(students/total*100) : 0}%)`;
        const activePercent = total ? Math.round(active / total * 100) : 0;
        document.getElementById('activeProgress').style.width = `${activePercent}%`;
        document.getElementById('newUsersCount').innerText = Math.floor(total * 0.12);
    }
    function updateStatsDisplay() { updateStats(); }

    function showNotification(msg, type) {
        const n = document.createElement('div');
        n.className = `fixed bottom-4 right-4 glass-card p-4 rounded-xl flex items-center gap-3 z-50 ${type === 'success' ? 'border-green-500/30 bg-green-500/10' : 'border-blue-500/30 bg-blue-500/10'}`;
        n.innerHTML = `<span class="material-symbols-outlined ${type === 'success' ? 'text-green-500' : 'text-blue-500'}">${type === 'success' ? 'check_circle' : 'info'}</span><span>${msg}</span>`;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 3000);
    }

    document.getElementById('searchUsers').addEventListener('input', filterUsers);
    document.getElementById('filterRole').addEventListener('change', filterUsers);
    document.getElementById('filterStatus').addEventListener('change', filterUsers);
    document.getElementById('rowsPerPage').addEventListener('change', (e) => { rowsPerPage = parseInt(e.target.value); currentPage = 1; renderTable(); });
    document.getElementById('prevPage').addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
    document.getElementById('nextPage').addEventListener('click', () => { const total = Math.ceil(filteredUsers.length / rowsPerPage); if (currentPage < total) { currentPage++; renderTable(); } });
    document.getElementById('selectAll').addEventListener('change', (e) => { document.querySelectorAll('.user-checkbox').forEach(cb => cb.checked = e.target.checked); });
    document.getElementById('bulkActionBtn').addEventListener('click', () => { const action = document.getElementById('bulkActionSelect').value; const selected = Array.from(document.querySelectorAll('.user-checkbox:checked')).map(cb => parseInt(cb.dataset.userId)); if (selected.length === 0) { showNotification('Select users first', 'error'); return; } showNotification(`${action} on ${selected.length} users`, 'info'); });
    document.getElementById('exportUsers').addEventListener('click', () => { const dataStr = JSON.stringify(allUsers); const blob = new Blob([dataStr], {type:'application/json'}); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'users.json'; a.click(); URL.revokeObjectURL(url); showNotification('Exported users', 'success'); });
    document.getElementById('reviewPendingBtn').addEventListener('click', () => { document.getElementById('filterStatus').value = 'pending'; filterUsers(); });
    const modal = document.getElementById('addUserModal');
    document.getElementById('addUserBtn').addEventListener('click', () => modal.classList.remove('hidden'));
    document.getElementById('closeAddUserModal').addEventListener('click', () => modal.classList.add('hidden'));
    document.getElementById('cancelAddUser').addEventListener('click', () => modal.classList.add('hidden'));
    document.getElementById('addUserForm').addEventListener('submit', (e) => { e.preventDefault(); showNotification('User added (demo)', 'success'); modal.classList.add('hidden'); });

    renderTable();
    updateStats();
});
</script>
@endpush