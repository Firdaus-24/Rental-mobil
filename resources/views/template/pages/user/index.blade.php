@extends('template.layouts.auth')
@push('head')
  <!-- SweetAlerts2  -->
  <link href="{{ asset('assets/plugins/SweetAlerts/dist/sweetalert2.min.css') }}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet"
    href="{{ asset('assets/plugins/DataTables/DataTables-1.13.1/css/dataTables.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/Responsive-2.4.0/css/responsive.bootstrap5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/Buttons-2.3.3/css/buttons.bootstrap5.min.css') }}">
  <!-- Toastr-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/build/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/build/style.css') }}">
@endpush
@section('content')
  <main class="mt-1 main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="py-4 container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="mb-4 card">
            <div class="pb-0 mb-3 card-header">
              <div class="flex-row d-flex justify-content-between">
                <div>
                  <h5 class="mb-0">Data User</h5>
                </div>
                <a href="#" class="mb-0 btn bg-gradient-danger btn-sm" type="button" data-bs-toggle="modal"
                  data-bs-target="#modalAdd"><i class="fas fa-plus"></i>&nbsp;
                  Tambah User</a>
              </div>
            </div>
            <div class="px-0 pt-0 pb-2 card-body">
              <div class="container">
                <div class="p-0 table-responsive">
                  <table id="DTFetch" class="table mb-0 align-items-center">
                    <thead>
                      <tr>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          No.
                        </th>
                        <th class="text-xs text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">
                          Nama</th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          E-Mail
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          Divisi
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          Role
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          Aktif
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                          Aksi
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('modal')
  <!-- Start::Modal Store -->
  <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle" aria-hidden="true">
    <form action="{{ route('user.store') }}" method="POST" class="formSave needs-validation"
      enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">User Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span class="text-secondary" aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="name" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama User" name="name"
                    id="name" required>
                  <div class="invalid-feedback">Masukkan Nama</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="email" class="col-form-label">E-Mail</label>
                  <input type="email" class="form-control" placeholder="Masukkan E-Mail" name="email" id="email"
                    required>
                  <div class="invalid-feedback">Masukkan E-Mail</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="username" class="col-form-label">Username</label>
                  <input type="text" class="form-control" placeholder="Masukkan Username" name="username"
                    id="username" required>
                  <div id="usernameInvalid" class="invalid-feedback">Masukkan Username</div>
                  <div id="username-error"></div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="col-form-label">Password</label>
                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password"
                    id="password" required>
                  <div class="invalid-feedback">Masukkan Password</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="division_id" class="col-form-label">Divisi</label>
                  <select name="division_id" class="form-select" id="division_id" required>
                    <option value="" disabled selected>Pilih Divisi</option>
                    @foreach ($division as $row)
                      <option value="{{ $row->uuid }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Pilih Divisi</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="role" class="col-form-label">Role</label>
                  <select name="role" class="form-select" id="role" required>
                    <option value="" disabled selected>Pilih Role</option>
                    @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                      <option value="admin">Admin</option>
                    @endif
                    <option value="kabiro">Kepala Biro</option>
                    <option value="kabid">Kepala Bidang</option>
                    <option value="kainstal">Kepala Instalasi</option>
                    <option value="kabag">Kepala Bagian</option>
                    <option value="plasma">Plasma</option>
                    <option value="staff">Staff</option>
                    @if (Auth::user()->role == 'superadmin')
                      <option value="superadmin">Superadmin</option>
                    @endif
                  </select>
                  <div class="invalid-feedback">Pilih Role</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="is_active" class="col-form-label">Aktif</label>
                  <select name="is_active" class="form-select" id="is_active" required>
                    <option value="" disabled>Pilih Aktif atau Nonaktif</option>
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                  <div class="invalid-feedback">Pilih Aktif atau Nonaktif</div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" id="btnSave" class="btn bg-gradient-danger"><i class="fa fa-floppy-o"></i>&nbsp;
              Simpan</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- End::Modal Store -->

  <!-- Start::Modal Show -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle"
    aria-hidden="true">
    <form action="" method="" class="formEdit" id="formEdit" enctype="multipart/form-data">
      <input type="hidden" id="uuid" name="uuid">
      <input type="hidden" id="usernameValue" name="usernameValue">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span class="text-secondary" aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="nameEdit" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama User" name="name"
                    id="nameEdit" required>
                  <div class="invalid-feedback">Masukkan Nama</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="emailEdit" class="col-form-label">E-Mail</label>
                  <input type="email" class="form-control" placeholder="Masukkan E-Mail" name="email"
                    id="emailEdit" required>
                  <div class="invalid-feedback">Masukkan E-Mail</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="usernameEdit" class="col-form-label">Username</label>
                  <input type="text" class="form-control" placeholder="Masukkan Username" name="username"
                    id="usernameEdit" required>
                  <div id="usernameEditInvalid" class="invalid-feedback">Masukkan Username</div>
                  <div id="usernameEdit-error"></div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="passwordEdit" class="col-form-label">Password</label>
                  <input type="password" class="form-control" placeholder="Masukkan Password" name="password"
                    id="passwordEdit">
                  <div class="invalid-feedback">Masukkan Password</div>
                  <label style="font-family: sans-serif; font-size:12px !important; "
                    class="fs-6 text-danger fst-italic fw-bold">*
                    Biarkan kosong jika tidak ingin diubah password</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="division_id" class="col-form-label">Divisi</label>
                  <select name="division_id" class="divisionEdit form-select" id="divisionEdit" required>
                    <option value="" disabled selected>Pilih Divisi</option>
                    @foreach ($division as $row)
                      <option value="{{ $row->uuid }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">Pilih Divisi</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="role" class="col-form-label">Role</label>
                  <select name="role" class="roleEdit form-select" id="roleEdit" required>
                    <option value="" disabled selected>Pilih Role</option>
                    @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                      <option value="admin">Admin</option>
                    @endif
                    <option value="kabiro">Kepala Biro</option>
                    <option value="kabid">Kepala Bidang</option>
                    <option value="kainstal">Kepala Instalasi</option>
                    <option value="kabag">Kepala Bagian</option>
                    <option value="plasma">Plasma</option>
                    <option value="staff">Staff</option>
                    @if (Auth::user()->role == 'superadmin')
                      <option value="superadmin">Superadmin</option>
                    @endif
                  </select>
                  <div class="invalid-feedback">Pilih Role</div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="is_active" class="col-form-label">Aktif</label>
                  <select name="is_active" class="isActiveEdit form-select" id="isActiveEdit" required>
                    <option value="" disabled>Pilih Aktif atau Nonaktif</option>
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                  <div class="invalid-feedback">Pilih Aktif atau Nonaktif</div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" id="btnChanges" class="btn bg-gradient-info"><i class="fa fa-floppy-o"></i>&nbsp;
              Ubah</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- End::Modal Show -->
@endsection
@push('scripts')
  <script>
    // * Datatables Start

    var Datatable = function() {

      var init = function() {
        var table = $('#DTFetch');
        table.DataTable({
          responsive: true,
          paging: true,
          language: {
            paginate: {
              previous: '<span aria-hidden="true"><i class="ni ni-bold-left" aria-hidden="true"></i></span>',
              next: '<span aria-hidden="true"><i class="ni ni-bold-right" aria-hidden="true"></i></span>'
            }
          },
          select: true,
          serverSide: true,
          lengthChange: false,
          processing: true,
          autoWidth: false,
          ajax: {
            url: '{{ route('user.fetch') }}',
            dataType: 'json',
            type: 'POST',
            data: function(d) {
              d._token = '{{ csrf_token() }}',
                d.f1 = $('#f1').val()
            }
          },
          dom: 'lBfrtip',
          lengthMenu: [10, 25, 50, 100, 250],
          pageLength: 10,
          buttons: [{
            extend: 'collection',
            text: 'Export',
            className: 'bg-danger',
            buttons: [{
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
              }, {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
              }, {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
              },

            ]
          }, {
            extend: 'pageLength',
            className: 'bg-danger',
            titleAttr: 'Show Records',
            text: 'Data per page',
            //   , lengthMenu: [10, 25, 50, 100, 250, "All"]
          }],
          columns: [{
            data: 'no'
          }, {
            data: 'name'
          }, {
            data: 'email'
          }, {
            data: 'division'
          }, {
            data: 'role'
          }, {
            data: 'user_active'
          }, {
            data: 'actions'
          }],
          columnDefs: [{
            'className': "",
            'targets': "_all"
          }, {
            "targets": 0,
            "className": "font-weight-bold mb-0 text-center text-sm",
            "width": "5%",
            "orderable": true
          }, {
            "targets": [1, 2],
            "className": "text-sm",
            "orderable": true
          }, {
            "targets": [3, 4, 5],
            "className": "text-center align-middle text-sm",
            "orderable": true
          }, {
            "targets": 6,
            "className": "text-center text-sm",
            "width": "10%",
            "orderable": false
          }, ],
        });
      }

      return {
        init: function() {
          init();
        }
      };
    }();

    // space username
    $(document).ready(function() {
      $(function() {
        $('#username, #usernameEdit').on('keypress', function(e) {
          if (e.which == 32) {
            return false;
          }
        });
      });

      $('#username').on('keyup', function() {
        const username = $(this).val();
        $.ajax({
          url: '{{ route('user.checkUsername') }}',
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            username: username
          },
          success: function(response) {
            if (response.exists) {
              $('#username-error').html(
                '<p class="mt-2 text-xs text-danger">Username sudah ada, silahkan gunakan username lain</p>'
              );
              $('#username').addClass('is-invalid');
              $('#usernameInvalid').hide();
              $('#btnSave').prop('disabled', true);
            } else {
              $('#username-error').empty();
              $('#username').removeClass('is-invalid');
              //   $('#usernameInvalid').show();
              $('#btnSave').prop('disabled', false);
            }
          }
        });
      });



      Datatable.init();
    });
    // * Datatables End
    $('#f1').on('change', function() {
      $('#DTFetch').DataTable().ajax.reload();
    });

    // Add Records Start
    $(document).ready(function() {
      $('.formSave').submit(function(e) {
        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: $(this).serialize(),
          dataType: "json",
          success: function(response) {
            toastr.success(response.message, 'Berhasil', {
              closeButton: true,
              progressBar: true,
              timeOut: 3000,
              positionClass: 'toast-bottom-right'
            });
            $('#modalAdd').modal('hide');
            $('.formSave')[0].reset();
            $('#DTFetch').DataTable().ajax.reload();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            // var response = JSON.parse(xhr.responseText);
            // console.log(response);
            toastr.error('Terjadi kesalahan: ' + xhr.status + ' - ' + thrownError,
              'Error', {
                closeButton: true,
                progressBar: true,
                timeOut: 4000,
                positionClass: 'toast-bottom-right'
              });
          }
        });
        return false;
      });
    });
    // Add Records End

    // Delete Record Start
    function Delete(id) {
      var dataId = $(id).data("id");
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success mx-1',
          cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Hapus',
        text: `Yakin Menghapus Data ini ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'GET',
            url: '/user/destroy/' + dataId,
            data: {
              id: dataId
            },
            dataType: 'json',
            success: function(response) {
              toastr.success(response.message, 'Berhasil', {
                closeButton: true,
                progressBar: true,
                timeOut: 3000,
                positionClass: 'toast-bottom-right'
              });
              $('#DTFetch').DataTable().ajax.reload();
            }
          });

        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          toastr.error('Hapus Dibatalkan', 'Gagal', {
            closeButton: true,
            progressBar: true,
            timeOut: 3000,
            positionClass: 'toast-bottom-right'
          });
        }
      })
    }
    // Delete Record End

    // Modal Edit Start
    function ShowModalEdit(id) {
      var dataId = $(id).data("id");
      $.ajax({
        url: "/user/show/" + dataId,
        type: 'GET',
        success: function(data) {
          $('#uuid').val(data.uuid);
          $('#nameEdit').val(data.name);
          $('#emailEdit').val(data.email);
          $('#usernameEdit').val(data.username);
          $('#usernameValue').val(data.username);
          $('.divisionEdit').val(data.division_id).change();
          $('.roleEdit').val(data.role).change();
          $('.isActiveEdit').val(data.is_active).change();
          $('#modalEdit').modal('show');

          $('#usernameEdit').on('keyup', function() {
            const username = $(this).val();
            const usernameValue = $('#usernameValue').val();
            $.ajax({
              url: '{{ route('user.checkUsername') }}',
              method: 'POST',
              data: {
                _token: '{{ csrf_token() }}',
                username: username
              },
              success: function(response) {
                if (response.exists && username != usernameValue) {
                  $('#usernameEdit-error').html(
                    '<p class="mt-2 text-xs text-danger">Username sudah ada, silahkan gunakan username lain</p>'
                  );
                  $('#usernameEdit').addClass('is-invalid');
                  $('#usernameEditInvalid').hide();
                  $('#btnChanges').prop('disabled', true);
                } else {
                  $('#usernameEdit-error').empty();
                  $('#usernameEdit').removeClass('is-invalid');
                  //   $('#usernameInvalid').show();
                  $('#btnChanges').prop('disabled', false);
                }
              }
            });
          });
        },
        error: function(error) {
          toastr.error('Terjadi kesalahan: ' + error + ' - ' + thrownError, 'Error', {
            closeButton: true,
            progressBar: true,
            timeOut: 4000,
            positionClass: 'toast-bottom-right'
          });
        }
      });


    }
    // Modal Edit Ends

    // start update function
    function update(e) {
      e.preventDefault();
      $.ajax({
        url: "/user/update/" + $('#uuid').val(),
        type: 'PUT',
        data: {
          "_token": "{{ csrf_token() }}",
          id: $('#uuid').val(),
          name: $('#nameEdit').val(),
          email: $('#emailEdit').val(),
          username: $('#usernameEdit').val(),
          newPassword: $('#passwordEdit').val(),
          role: $('.roleEdit').val(),
          is_active: $('.isActiveEdit').val(),
          division_id: $('.divisionEdit').val(),
        },
        success: function(response) {
          toastr.success(response.message, 'Berhasil', {
            closeButton: true,
            progressBar: true,
            timeOut: 3000,
            positionClass: 'toast-bottom-right'
          });
          $('#DTFetch').DataTable().ajax.reload();
          $("#modalEdit").modal('hide');
        },
        error: function(error) {
          toastr.error('Terjadi kesalahan: ' + error + ' - ' + thrownError, 'Error', {
            closeButton: true,
            progressBar: true,
            timeOut: 4000,
            positionClass: 'toast-bottom-right'
          });
          $('#DTFetch').DataTable().ajax.reload();
        }
      });
    }

    $("#formEdit").on("submit", update);
    // end update function
  </script>
@endpush
