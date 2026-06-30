<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Work Update</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',Arial,sans-serif;background:linear-gradient(135deg,#667eea,#764ba2);min-height:100vh;display:flex;align-items:center;justify-content:center}
.card{background:#fff;border-radius:16px;padding:30px;width:550px;box-shadow:0 10px 40px rgba(0,0,0,0.2)}
h3{color:#4a4a6a;margin-bottom:20px;font-size:18px}
label{display:block;font-size:12px;color:#888;font-weight:600;margin-bottom:6px;margin-top:16px;text-transform:uppercase}
textarea{width:100%;padding:12px;border:2px solid #eee;border-radius:10px;resize:vertical;min-height:90px;font-size:14px;outline:none}
textarea:focus{border-color:#667eea}
.save-btn{width:100%;padding:12px;background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;border:none;border-radius:10px;cursor:pointer;font-size:15px;font-weight:600;margin-top:20px}
.back{display:block;text-align:center;margin-top:12px;color:#667eea;font-size:13px;text-decoration:none}
</style>
</head>
<body>
<div class="card">
    <h3>✏ Edit Work Update — {{ $update->user->name }}</h3>
    <form method="POST" action="{{ route('work.update', $update->id) }}">
        @csrf @method('PUT')
        <label>Morning Work</label>
        <textarea name="morning_work" required>{{ $update->morning_work }}</textarea>
        <label>Evening Work</label>
        <textarea name="evening_work" required>{{ $update->evening_work }}</textarea>
        <button class="save-btn" type="submit">💾 Save Changes</button>
    </form>
    <a class="back" href="{{ route('dashboard') }}">← Back to Dashboard</a>
</div>
</body>
</html>