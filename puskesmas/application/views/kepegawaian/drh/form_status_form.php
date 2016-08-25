<form action="#" method="POST" name="frmPegawai">
  <div class="row" style="margin: 15px 5px 15px 5px">
    <div class="col-sm-8">
      <?php if(validation_errors()!=""){ ?>
      <div class="alert alert-warning alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>  <i class="icon fa fa-check"></i> Information!</h4>
        <?php echo validation_errors()?>
      </div>
      <?php } ?>

      <?php if($alert_form!=""){ ?>
      <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>  <i class="icon fa fa-check"></i> Information!</h4>
        <?php echo $alert_form?>
      </div>
      <?php } ?>
    </div>
    <div class="col-sm-12" style="text-align: right">
      <button type="button" name="btn_biodata_berhenti_save" class="btn btn-warning"><i class='fa fa-save'></i> &nbsp; Simpan</button>
      <button type="button" name="btn_biodata_berhenti_close" class="btn btn-primary"><i class='fa fa-close'></i> &nbsp; Tutup</button>
    </div>
  </div>

  <div class="row" style="margin: 5px">
          <div class="col-md-12">
            <div class="box box-primary">
             
             <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px">
                  TMT
                </div>
                <div class="col-md-8">
                  <div id='tmt' name="tmt" value="<?php
                    if(set_value('tmt')=="" && isset($tmt)){
                      $tmt = strtotime($tmt);
                    }else{
                      $tmt = strtotime(set_value('tmt'));
                    }

                    if($tmt=="") $tmt = time();
                    echo date("Y-m-d",$tmt);
                  ?>" ></div>
                </div>
              </div>

              <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px">
                  Jenis
                </div>
                <div class="col-md-8">
                  <select  name="berhenti_tipe" type="text" class="form-control" >
                    <option value=''>-</option>
                      <?php foreach($jenis_berhenti as $jenis) : ?>
                        <?php
                        if(set_value('id_berhenti')=="" && isset($id_berhenti)){
                          $id_berhenti = $id_berhenti;
                        }else{
                          $id_berhenti = set_value('id_berhenti');
                        }

                        if(set_value('id_berhenti')=="" && isset($id_berhenti)){
                          $id_berhenti = $id_berhenti;
                        }else{
                          $id_berhenti = set_value('id_berhenti');
                        }

                        $select = $jenis->id_berhenti == $id_berhenti ? 'selected' : '' ;
                        ?>
                        <option value="<?php echo $jenis->jenis ?>" <?php echo $select ?>><?php echo ucwords($jenis->jenis)?></option>
                      <?php endforeach ?>
                  </select>
                </div>
              </div>

              <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px">
                  Kategori 
                </div>
                <div class="col-md-8">
                  <select  name="id_berhenti" type="text" class="form-control">
                    <option value=''>-</option>
                  </select>
                </div>
              </div>

              <div class="row" style="margin: 5px">
                <div class="col-md-12" style="padding: 5px">
                  Surat Keputusan
                </div>
              </div>
              <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px 5px 5px 30px">
                  Tanggal
                </div>
                <div class="col-md-8">
                  <div id='sk_tgl' name="sk_tgl" value="<?php
                    if(set_value('sk_tgl')=="" && isset($sk_tgl)){
                      $tgl_sk = strtotime($sk_tgl);
                    }else{
                      $tgl_sk = strtotime(set_value('sk_tgl'));
                    }

                    if($tgl_sk=="") $tgl_sk = time();
                    echo date("Y-m-d",$tgl_sk);
                  ?>" ></div>
                </div>
              </div>
              <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px 5px 5px 30px">
                  Nomor
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="sk_nomor" id="sk_nomor" placeholder="Nomor SK" value="<?php 
                  if(set_value('sk_nomor')=="" && isset($sk_nomor)){
                    echo $sk_nomor;
                  }else{
                    echo  set_value('sk_nomor');
                  }
                  ?>">
                </div>
              </div>
              <div class="row" style="margin: 5px">
                <div class="col-md-4" style="padding: 5px 5px 5px 30px">
                  Pejabat
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="sk_pejabat" id="sk_pejabat" placeholder="SK Penjabat" value="<?php 
                  if(set_value('sk_pejabat')=="" && isset($sk_pejabat)){
                    echo $sk_pejabat;
                  }else{
                    echo  set_value('sk_pejabat');
                  }
                  ?>">
                </div>
              </div>
              </div>

              <br>
            </div>
          </div>
  </div>
</form>

<script>
  $(function () { 
    tabIndex = 1;

    $("[name='berhenti_tipe']").change(function(){
    
      var berhenti_tipe = $(this).val();
      $.ajax({
        url  : '<?php echo site_url('kepegawaian/drh_berhenti/set_tipe/'.$id_berhenti) ?>',
        type : 'POST',
        data : 'berhenti_tipe=' + berhenti_tipe,
        success : function(data) {
          $("[name='id_berhenti']").html(data);
          $("[name='id_berhenti']").change();
        }
      });

      return false;
    }).change();
  
    $("[name='sk_tgl']").jqxDateTimeInput({ formatString: 'dd-MM-yyyy', theme: theme, height:30});
    $("[name='tmt']").jqxDateTimeInput({ formatString: 'dd-MM-yyyy', theme: theme, height:30 <?php if($disable!="") echo ",disabled:true"?>});

    $("[name='btn_biodata_berhenti_close']").click(function(){
        $("#popup_berhenti").jqxWindow('close');
    });

    $("[name='btn_biodata_berhenti_save']").click(function(){
        var data = new FormData();
        $('#biodata_notice-content').html('<div class="alert">Mohon tunggu, proses simpan data....</div>');
        $('#biodata_notice').show();

        data.append('tmt',                  $("[name='tmt']").val());
        data.append('id_berhenti',          $("[name='id_berhenti']").val());
        data.append('berhenti_tipe',        $("[name='berhenti_tipe']").val());
        data.append('sk_tgl',               $("[name='sk_tgl']").val());
        data.append('sk_pejabat',           $("[name='sk_pejabat']").val());
        data.append('sk_nomor',             $("[name='sk_nomor']").val());

        $.ajax({
            cache : false,
            contentType : false,
            processData : false,
            type : 'POST',
            url : '<?php echo base_url()."kepegawaian/drh_berhenti/{action}/{id}/{tmt}"   ?>',
            data : data,
            success : function(response){
              if(response=="OK"){
                $("#popup_berhenti").jqxWindow('close');
                alert("Data Pemberhentian berhasil disimpan.");
                $("#jqxgridBerhenti").jqxGrid('updatebounddata', 'filter');
              }else if(response=="NOTOK"){
                alert("Data Sudah pernah disimpan");
              }else{
                $('#popup_berhenti_content').html(response);
              }
            }
        });

        return false;
    });

  });
</script>
