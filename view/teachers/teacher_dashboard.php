<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Acadex — Schedule Dashboard (Teacher)</title>

  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="app">
    <!-- SIDEBAR -->
    <aside class="sidebar" aria-label="Sidebar">
      <div class="brand">
        <div class="logo">PS</div>
        <div>
          <div class="brand-title">Acadex</div>
          <div class="brand-sub">Learn. Teach. Grow.</div>
        </div>
      </div>

      <nav>
        <div class="nav-item"> Dashboard</div>
        <div class="nav-item"> My Courses</div>
        <div class="nav-item active"> My Schedule</div>
        <div class="nav-item"> Reviews</div>
        <div class="nav-item"> Messages</div>
        <div class="nav-item"> QA</div>
        <div class="nav-item"> My Accounts</div>
      </nav>
    </aside>

    <!-- CENTER -->
    <main class="center">
      <div class="topbar">
        <div class="greeting">
          Good Afternoon, <span class="accent-name">Asraful Islam</span> 😊
          <small class="greeting-sub">Track, manage and see the latest updates here</small>
        </div>
        <div class="actions">
          <button class="btn">New Course +</button>
          <button class="icon-btn" title="bell">🔔</button>
          <div class="profile">
            <img src="" alt="avatar" class="avatar">
            <div class="profile-text">
              <div class="profile-name">Asraful Islam</div>
              <div class="profile-role">Instractor</div>
            </div>
          </div>
        </div>
      </div>

      

        <div class="grid">
          <div class="timeline" aria-hidden="true">
            <div class="t">08:00</div>
            <div class="t">09:00</div>
            <div class="t">10:00</div>
            <div class="t">11:00</div>
            <div class="t">12:00</div>
            <div class="t">13:00</div>
            <div class="t">14:00</div>
            <div class="t">15:00</div>
            <div class="t">16:00</div>
            <div class="t">17:00</div>
          </div>


          <div class="schedule-area" id="schedule-area">
            <!-- event cards inserted by JS -->
          </div>
        </div>
      </div>
    </main>

</body>
</html>
