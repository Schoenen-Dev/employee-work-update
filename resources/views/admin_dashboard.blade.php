<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',Arial,sans-serif;background:linear-gradient(135deg,#667eea,#764ba2);min-height:100vh}
.header{background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);padding:16px 30px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,255,255,0.2)}
.header h2{color:#fff;font-size:20px}
.logout-btn{background:rgba(255,255,255,0.2);color:#fff;border:1px solid rgba(255,255,255,0.4);padding:7px 16px;border-radius:20px;cursor:pointer;font-size:13px}
.logout-btn:hover{background:#fff;color:#764ba2}
.container{max-width:1100px;margin:30px auto;padding:0 20px}
.card{background:#fff;border-radius:16px;padding:25px;box-shadow:0 10px 40px rgba(0,0,0,0.15)}
.card h3{color:#4a4a6a;font-size:18px;margin-bottom:20px}
.success{background:#d4edda;color:#155724;padding:10px 15px;border-radius:8px;margin-bottom:15px;font-size:14px}
table{width:100%;border-collapse:collapse;font-size:14px}
thead{background:linear-gradient(135deg,#667eea,#764ba2)}
thead th{color:#fff;padding:12px 15px;text-align:left;font-weight:600}
tbody tr{border-bottom:1px solid #f0f0f0;transition:0.2s}
tbody tr:hover{background:#f8f7ff}
td{padding:12px 15px;color:#444;vertical-align:top}
.name-badge{background:#f0f4ff;color:#667eea;padding:4px 10px;border-radius:20px;font-weight:600;font-size:13px}
.edit-btn{background:#f0ad4e;color:#fff;border:none;padding:6px 14px;border-radius:6px;cursor:pointer;font-size:12px;font-weight:600}
.del-btn{background:#dc3545;color:#fff;border:none;padding:6px 14px;border-radius:6px;cursor:pointer;font-size:12px;font-weight:600;margin-left:5px}
.file-link{color:#667eea;font-size:12px;font-weight:600}
.no-data{text-align:center;color:#aaa;padding:40px}
</style>
</head>
<body>
<div class="header">
    <h2>🛡 Admin Dashboard</h2>
    <div style="display:flex;align-items:center;gap:12px">
        <span style="color:#fff;font-size:14px">👤 Admin</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</div>
<div class="container">
    @if(session('success'))<div class="success">✅ {{ session('success') }}</div>@endif
    <div class="card">
        <h3>📋 All Employee Work Updates</h3>
        @if($updates->isEmpty())
        <div class="no-data">No work updates found.</div>
        @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>Morning Work</th>
                    <th>Evening Work</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($updates as $i => $u)
            <tr>
                <td>{{ $i+1 }}</td>
                <td><span class="name-badge">{{ $u->user->name }}</span></td>
                <td>{{ \Carbon\Carbon::parse($u->date)->format('d M Y') }}</td>
                <td>{{ $u->morning_work }}</td>
                <td>{{ $u->evening_work }}</td>
                <td>
@if($u->file_paths)
<button onclick="document.getElementById('modal-{{$u->id}}').style.display='flex'" style="padding:6px 14px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:6px;cursor:pointer;font-size:12px;font-weight:600">👁 View Files ({{ count($u->file_paths) }})</button>
<div id="modal-{{$u->id}}" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.7);z-index:999;align-items:center;justify-content:center">
    <div style="background:#fff;border-radius:16px;padding:25px;max-width:700px;width:90%;max-height:80vh;overflow-y:auto;position:relative">
        <button onclick="document.getElementById('modal-{{$u->id}}').style.display='none'" style="position:absolute;top:12px;right:12px;background:#dc3545;color:#fff;border:none;border-radius:50%;width:30px;height:30px;cursor:pointer;font-size:16px">✕</button>
        <h4 style="color:#4a4a6a;margin-bottom:15px">📎 {{ $u->user->name }} — Files</h4>
        @foreach($u->file_paths as $i => $path)
        @php $ext = pathinfo($u->file_names[$i], PATHINFO_EXTENSION); @endphp
        <div style="margin-bottom:15px;padding-bottom:15px;border-bottom:1px solid #eee">
            <p style="font-size:12px;color:#888;margin-bottom:8px">{{ $u->file_names[$i] }}</p>
            @if(in_array($ext, ['jpg','jpeg','png']))
                <img src="{{ asset('storage/'.$path) }}" style="max-width:100%;border-radius:8px">
            @elseif($ext === 'pdf')
                <iframe src="{{ asset('storage/'.$path) }}" style="width:100%;height:400px;border-radius:8px;border:1px solid #eee"></iframe>
            @else
                <a href="{{ asset('storage/'.$path) }}" target="_blank" style="color:#667eea;font-weight:600">⬇ Download {{ $u->file_names[$i] }}</a>
            @endif
        </div>
        @endforeach
    </div>
</div>
@else — @endif
                </td>
                <td>
                    <a href="{{ route('work.edit', $u->id) }}"><button class="edit-btn">✏ Edit</button></a>
                    <form method="POST" action="{{ route('work.destroy', $u->id) }}" style="display:inline" onsubmit="return confirm('Delete this record?')">
                        @csrf @method('DELETE')
                        <button class="del-btn">🗑 Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
</body>
</html>