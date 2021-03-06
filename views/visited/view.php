<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use Da\QrCode\QrCode;

$this->title = $model->visit_code;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="view">
    <h2>Detail Kunjungan</h2>
    <div class="col-md-4 text-center">
        
        <?php
            // if($model->status == 1){
                $qrCode = (new QrCode($model->visit_code))->setSize(600)->setMargin(5)->useForegroundColor(0, 0, 0);
                echo '<img src="'.$qrCode->writeDataUri().'" alt="..." class="img-thumbnail"><hr>';
            echo Html::a('<i class="fa glyphicon glyphicon-save"></i> Unduh Kode Kunjungan', 
                [
                    '/visited/export', 
                    'visit_code' => $model->visit_code,
                    'guest_name' => $model->guest_name,
                    'destination_id' => $model->tenant->company_name
                ], 
                [
                    'class'=>'btn btn-success', 
                    'target'=>'_blank', 
                    'data-toggle'=>'tooltip', 
                    'title'=>'Unduh Kode Kunjungan'
                ]);

            // }else{
            //     echo '<img src="'.$model->photo.'" class="img-thumbnail">';
            // }
        ?> 
    </div>
    <div class="col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'guest_name',
                [
                    'attribute' => 'type_id',
                    'value' => function($data) {
                        return $data->type->title;
                    }
                ],
                'id_number',
                'gender',
                'phone_number',
                'email:email',
                // 'photo',
                'address',
                'visit_code',
                [
                    'attribute' => 'destination_id',
                    'value' => function($data) {
                        return $data->tenant->company_name;
                    }
                ],
                'dt_visit',
                'long_visit',
                'host',
                'additional_info:ntext',
                // 'created',
            ],
        ]) ?>
    </div>
</div>