<div class="login-box">
    <h2>Kelompok 1 19.3B.04</h2>
    <?= $this->session->flashdata('pesan'); ?>
    <form method="POST" action="<?= base_url('auth'); ?>">
        <div class="user-box">
            <input type="text" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="password" name="password" required="">
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            <label>Password</label>
        </div>
        <button type="submit">
            Login
        </button>
    </form>
</div>