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
                  <h5 class="mb-0">Data Transaction</h5>
                </div>
                {{-- <a href="#" class="mb-0 btn bg-gradient-danger btn-sm" type="button" data-bs-toggle="modal"
                  data-bs-target="#modalAdd"><i class="fas fa-plus"></i>&nbsp; Tambah Transaction</a> --}}
              </div>
            </div>
            <div class="px-0 pt-0 pb-2 card-body">
              <div class="container">
                <div class="p-0 table-responsive">
                  <table id="DTFetch" class="table mb-0 align-items-center">
                    <thead>
                      <tr>
                        {{-- <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">No.
                        </th> --}}
                        <th class="text-xs text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Merk</th>
                        <th class="text-xs text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Model</th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">Plat
                          Nomor
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">Tanggal
                          mulai
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">Tanggal
                          Selesai
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">Status
                        </th>
                        <th class="text-xs text-center text-uppercase text-secondary font-weight-bolder opacity-7">Aksi
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
    <form action="{{ route('transaction.store') }}" method="POST" class="formSave needs-validation"
      enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Transaction Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span class="text-secondary" aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="merk" class="col-form-label">Merk</label>
              <input type="text" class="form-control" placeholder="Masukkan Merk" name="merk" id="merk"
                required>
              <div class="invalid-feedback">Masukkan Merk</div>
            </div>
            <div class="form-group">
              <label for="model" class="col-form-label">Tipe</label>
              <input type="text" class="form-control" placeholder="Masukkan Tipe" name="model" id="model"
                required>
              <div class="invalid-feedback">Masukkan Tipe</div>
            </div>
            <div class="form-group">
              <label for="nopol" class="col-form-label">Plat Nomor</label>
              <input type="text" class="form-control" placeholder="Masukkan Plat Nomor" name="nopol" id="nopol"
                required>
              <div class="invalid-feedback">Masukkan Plat Nomor/div>
              </div>
            </div>
            <div class="form-group">
              <label for="tarif" class="col-form-label">Tarif</label>
              <input type="number" class="form-control" placeholder="Masukkan Tarif" name="tarif" id="tarif"
                required>
              <div class="invalid-feedback">Masukkan Tarif</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn bg-gradient-danger"><i class="fa fa-floppy-o"></i>&nbsp;
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
    <form action="" method="" class="formEdit needs-validation" id="formEdit"
      enctype="multipart/form-data">
      <input type="hidden" id="id" name="id">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Edit Transaction</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span class="text-secondary" aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="merk" class="col-form-label">Merk</label>
              <input type="text" class="form-control" placeholder="Masukkan Merk" name="merk" id="merkEdit"
                required>
              <div class="invalid-feedback">Masukkan Merk</div>
            </div>
            <div class="form-group">
              <label for="model" class="col-form-label">Tipe</label>
              <input type="text" class="form-control" placeholder="Masukkan Tipe" name="model" id="modelEdit"
                required>
              <div class="invalid-feedback">Masukkan Tipe</div>
            </div>
            <div class="form-group">
              <label for="nopol" class="col-form-label">Plat Nomor</label>
              <input type="text" class="form-control" placeholder="Masukkan Plat Nomor" name="nopol"
                id="nopolEdit" required>
              <div class="invalid-feedback">Masukkan Plat Nomor/div>
              </div>
            </div>
            <div class="form-group">
              <label for="tarif" class="col-form-label">Tarif</label>
              <input type="number" class="form-control" placeholder="Masukkan Tarif" name="tarif" id="tarifEdit"
                required>
              <div class="invalid-feedback">Masukkan Tarif</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" id="btnChanges" class="btn bg-gradient-info"><i class="fa fa-floppy-o"></i>&nbsp;
              Ubah</button>
            {{-- <button type="button" onclick="btnUpdate()" class="btn bg-gradient-info"><i
                class="fa fa-floppy-o"></i>&nbsp;
              Ubah</button> --}}
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
            url: '{{ route('transaction.fetch') }}',
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
            data: 'merk'
          }, {
            data: 'model'
          }, {
            data: 'nopol'
          }, {
            data: 'tgl_mulai'
          }, {
            data: 'tgl_selesai'
          }, {
            data: 'actions'
          }, ],
          //   order: [
          //     [6, 'desc']
          //   ],
          columnDefs: [{
            'className': "",
            'targets': "_all"
          }, {
            "targets": 0,
            "className": "font-weight-bold mb-0 text-center text-sm",
            "width": "5%",
            "orderable": true
          }, {
            "targets": [0,
              1,
              2, 3, 4
            ],
            "className": "text-center align-middle text-sm",
            "orderable": true
          }, {
            "targets": 5,
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

    jQuery(document).ready(function() {
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
            toastr.error('Terjadi kesalahan: ' + xhr.status + ' - ' + thrownError, 'Error', {
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

    function hapus(id) {
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
            url: '/transaction/destroy/' + dataId,
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
            },
            error: function(xhr, status, error) {
              if (xhr.status === 422) {
                toastr.error(xhr.responseJSON.message, 'Gagal', {
                  closeButton: true,
                  progressBar: true,
                  timeOut: 3000,
                  positionClass: 'toast-bottom-right'
                });
              } else {
                toastr.error('Terjadi kesalahan: ' + xhr.status + ' - ' + error, 'Gagal', {
                  closeButton: true,
                  progressBar: true,
                  timeOut: 3000,
                  positionClass: 'toast-bottom-right'
                });
              }
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
        url: "/transaction/show/" + dataId,
        type: 'GET',
        success: function(data) {
          $('#id').val(data.id);
          $('#merkEdit').val(data.merk);
          $('#modelEdit').val(data.model);
          $('#nopolEdit').val(data.nopol);
          $('#tarifEdit').val(data.tarif);
          $('#modalEdit').modal('show');
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
        url: "/transaction/update/" + $('#id').val(),
        type: 'PUT',
        data: {
          "_token": "{{ csrf_token() }}",
          id: $('#id').val(),
          merk: $('#merkEdit').val(),
          model: $('#modelEdit').val(),
          nopol: $('#nopolEdit').val(),
          tarif: $('#tarifEdit').val(),
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
