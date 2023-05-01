<x-app-layout title="Dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <center>
                    <div class="card-header border-0">
                        <h5>Selamat datang di Halaman Admin, {{ Auth::user()->name }}</h5>
                    </div>
                    <div class="card-body">
                        <h3>HAI ADMIN</h3>

                        <div class="testimonials ">
                            <p>Selamat datang diHalaman Admin</p>
                            <p>Website ini dibuat oleh 5 orang dengan kepintaran yang ada</p>
                            <hp><a href="https://www.instagram.com/irmatltobing/">Irma Triana Lbn Tobing</a></p>
                                <p><a href="https://www.instagram.com/simon.celi11/">Simon Natanael Siaahan</a></p>
                                <p><a href="https://www.instagram.com/rini_meycia/">Rini Panjaitan</a></p>
                                <p><a href="https://www.instagram.com/__soniapasaribu__/">Sonia Magdalena Pasaribu</a>
                                </p>
                                <p><a href="https://www.instagram.com/casandra_napitupulu/">Casandra Napitupulu</a></p>
                                <div class="clear"></div>
                                <small class="testi-meta"><span class="user">Anda bisa membuka link ini untuk melihat 5
                                        orang tersebut</span>
                                    <span class="info"></span><br><a href="https://www.instagram.com/wops__/">Instagram
                                        : Wops__</a></small>
                        </div>
                    </div>
                    <div class="cont span_2_of_about">
                        <h3>WEBSITE WOPS</h3>
                        <div class="testimonials ">
                            <p>Halaman admin ini dapat membantu anda untuk</p>
                            <p>1. Update buku </p>
                            <p>2. delete buku</p>
                            <p>3. Edit buku </p>
                            <p>4. Menerima pesanan buku </p>
                            <p>5. Menolak pesanan buku </p>
                            <div class="clear"></div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</x-app-layout>