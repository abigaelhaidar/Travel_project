<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Dashboard</h2>
                    <p class="mb-0 text-title-gray"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
        <div class="row">
            <div class="col-xl-4 proorder-xxl-1 col-sm-6 box-col-6">
                <div class="card welcome-banner">
                    <div class="card-header p-0 card-no-border">
                        <div class="welcome-card"><img class="w-100 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/welcome-bg.png" alt="" /><img class="position-absolute img-1 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/img-1.png" alt="" /><img class="position-absolute img-2 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/img-2.png" alt="" /><img class="position-absolute img-3 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/img-3.png" alt="" /><img class="position-absolute img-4 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/img-4.png" alt="" /><img class="position-absolute img-5 img-fluid" src="<?= base_url('assets/') ?>admin/images/dashboard-1/img-5.png" alt="" /></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-center">
                            <h1>Hallo,  <?php echo $user['username'] ?><img src="<?= base_url('assets/') ?>admin/images/dashboard-1/hand.png" alt="" /></h1>
                        </div>

                        <p> Selamat Datang!</p>
                        
                                <!-- Display Time -->
                                <span id="current-time">11:14:00 AM</span>

                                <script>
                                    // Function to format time with leading zero for single-digit minutes and seconds
                                    function formatTime(date) {
                                        let hours = date.getHours();
                                        let minutes = date.getMinutes();
                                        let seconds = date.getSeconds();
                                        let ampm = hours >= 12 ? 'PM' : 'AM';
                                        hours = hours % 12;
                                        hours = hours ? hours : 12; // the hour '0' should be '12'
                                        minutes = minutes < 10 ? '0' + minutes : minutes;
                                        seconds = seconds < 10 ? '0' + seconds : seconds;

                                        return hours + ':' + minutes + ':' + seconds + ' ' + ampm;
                                    }

                                    // Update time every second
                                    function updateTime() {
                                        const timeElement = document.getElementById('current-time');
                                        const now = new Date();
                                        timeElement.textContent = formatTime(now);
                                    }

                                    // Call updateTime every 1000 milliseconds (1 second)
                                    setInterval(updateTime, 1000);

                                    // Initial time set on page load
                                    updateTime();
                                </script>
                    </div>
                </div>
            </div>

        </div>

       
    </div>
</div>