<!-- Modal -->
<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Login</h4>
    </div>

    <div class="modal-body">
      <hr style="margin-top:-20px;">
      <form role="form" action="web/login" method="post">
        <div class="form-group">
          <label for="exampleInputUn">Username</label>
          <input type="username" name="username" class="form-control" id="exampleInputUn" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
        </div>

    </div>

    <div class="modal-footer">
        <hr style="margin-top:-20px;">
        <div style="float:left">
          <a href="daftar">Daftar Anggota Baru</a> <!--| <a href="lp">Lupa Password?</a>-->
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="btnlogin" class="btn btn-primary">Login</button>
    </div>

    </form>
	</div>
  </div>
</div>
