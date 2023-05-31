<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Detail Metode Transaksi Pembayaran</h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/pembayaran/updatePembayaran" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['pembayaran']['id']; ?>">

                <div class="card-body">

                    <div class="form-group">

                        <label >Nama Metode Pembayaran</label>

                        <input type="text" class="form- control" placeholder="masukkan metode..." name="nama_pembayaran" value="<?= $data['pembayaran']['nama_pembayaran']; ?>">

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>
