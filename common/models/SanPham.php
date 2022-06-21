<?php

namespace common\models;

use Yii;
use yii\base\BaseObject;
use yii\db\Expression;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%san_pham}}".
 *
 * @property int $id
 * @property string $name Tên sản phẩm
 * @property string|null $code
 * @property string|null $mo_ta_ngan_gon Tóm tắt
 * @property string|null $mo_ta_chi_tiet Mô tả chi tiết
 * @property int $ban_chay Bán chạy
 * @property int $noi_bat Nổi bật
 * @property int $moi_ve Mới về
 * @property float $gia_ban Giá bán
 * @property float $gia_canh_tranh
 * @property string $anh_dai_dien
 * @property string $ngay_dang
 * @property string|null $ngay_sua
 * @property int $thuong_hieu_id
 * @property int $nguoi_tao_id
 * @property int|null $nguoi_sua_id
 * @property int $so_luong
 * @property string|null $ngay_hang_ve
 *
 * @property AnhSanPham[] $anhSanPhams
 * @property DonHangChiTiet[] $donHangChiTiets
 * @property User $nguoiSua
 * @property User $nguoiTao
 * @property PhanLoaiSanPham[] $phanLoaiSanPhams
 * @property SizeSanPham[] $sizeSanPhams
 * @property ThuongHieu $thuongHieu
 * @property TuKhoaSanPham[] $tuKhoaSanPhams
 */
class SanPham extends \yii\db\ActiveRecord
{
    public $anh_san_phams;
    public $phan_loai_san_phams;
    public $tu_khoa_san_phams;
    public $size_san_phams;
    public $gia_ban_tu;//để search giá bán
    public $ngay_dang_tu;//để search ngày đăng
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%san_pham}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nguoi_tao_id','ngay_dang','anh_san_phams','phan_loai_san_phams','tu_khoa_san_phams','size_san_phams'],'safe'],
            [['name', 'gia_ban', 'gia_canh_tranh',  'thuong_hieu_id'], 'required','message'=>'{attribute} không được để trống'],
            [['mo_ta_chi_tiet'], 'string'],
            [['ban_chay', 'noi_bat', 'moi_ve', 'thuong_hieu_id', 'nguoi_tao_id', 'nguoi_sua_id', 'so_luong'], 'integer'],
            [['gia_ban', 'gia_canh_tranh'], 'number'],
            [['ngay_dang', 'ngay_sua', 'ngay_hang_ve'], 'safe'],
            [['name', 'code'], 'string', 'max' => 150],
            [['mo_ta_ngan_gon'], 'string', 'max' => 500],
            [['anh_dai_dien'], 'string', 'max' => 100],
            [['thuong_hieu_id'], 'exist', 'skipOnError' => true, 'targetClass' => ThuongHieu::className(), 'targetAttribute' => ['thuong_hieu_id' => 'id']],
            [['nguoi_tao_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nguoi_tao_id' => 'id']],
            [['nguoi_sua_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nguoi_sua_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mã sản phẩm',
            'name' => 'Tên sản phẩm',
            'code' => 'Code',
            'mo_ta_ngan_gon' => 'Tóm tắt',
            'mo_ta_chi_tiet' => 'Mô tả chi tiết',
            'size'=>'size',
            'ban_chay' => 'Bán chạy',
            'noi_bat' => 'Nổi bật',
            'moi_ve' => 'Mới về',
            'gia_ban' => 'Giá bán',
            'gia_canh_tranh' => 'Gia Canh Tranh',
            'anh_dai_dien' => 'Anh Dai Dien',
            'anh_san_phams'=>'Ảnh sản phẩm',
            'ngay_dang' => 'Ngay Dang',
            'ngay_sua' => 'Ngay Sua',
            'thuong_hieu_id' => 'Thuong Hieu ID',
            'phan_loai_san_phams'=>'Phân loại sản phẩm',
            'nguoi_tao_id' => 'Nguoi Tao ID',
            'nguoi_sua_id' => 'Nguoi Sua ID',
            'so_luong' => 'Số lượng',
            'ngay_hang_ve' => 'Ngay Hang Ve',
        ];
    }

    /**
     * Gets query for [[AnhSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnhSanPhams()
    {
        return $this->hasMany(AnhSanPham::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[DonHangChiTiets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonHangChiTiets()
    {
        return $this->hasMany(DonHangChiTiet::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[NguoiSua]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiSua()
    {
        return $this->hasOne(User::className(), ['id' => 'nguoi_sua_id']);
    }

    /**
     * Gets query for [[NguoiTao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNguoiTao()
    {
        return $this->hasOne(User::className(), ['id' => 'nguoi_tao_id']);
    }

    /**
     * Gets query for [[PhanLoaiSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhanLoaiSanPhams()
    {
        return $this->hasMany(PhanLoaiSanPham::className(), ['san_pham_id' => 'id']);
    }

    public function getSizeSanPhams()
    {
        return $this->hasMany(SizeSanPham::className(), ['san_pham_id' => 'id']);
    }

    /**
     * Gets query for [[ThuongHieu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThuongHieu()
    {
        return $this->hasOne(ThuongHieu::className(), ['id' => 'thuong_hieu_id']);
    }

    /**
     * Gets query for [[TuKhoaSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTuKhoaSanPhams()
    {
        return $this->hasMany(TuKhoaSanPham::className(), ['san_pham_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if($insert){
            $this->ngay_dang = new Expression("NOW()");
            $this->nguoi_tao_id = 2;//Yii::$app->user->id;
        }
        else{
            $this->ngay_sua = new Expression("NOW()");
            $this->nguoi_tao_id = 2;
        }

        //Đầu tiên cần đổi giá trị ngày hàng về từ DMY sang YMD để lưu vào CSDL
        $this->ngay_hang_ve = API_H17::convertDMYtoYMD($this->ngay_hang_ve);
        $this->code = API_H17::createCode($this->name);

        #region Upload file
        $file = UploadedFile::getInstance($this,'anh_dai_dien');
        if(!is_null($file)){
            $time = time();
            $type = $file->getExtension();

            $ten_file = API_H17::createCode($this->name);
            $ten_file = "{$time}_logo-{$ten_file}.{$type}";
            $this->anh_dai_dien = $ten_file;
            if(!$insert){
                //đoạn này là update a.jpg = b.jpg
                $sanpham = self::findOne($this->id);
                Yii::$app->session->set('old_name_logo', $sanpham->anh_dai_dien);
            }

        }else{//không upload file
            if($insert)
                $this->anh_dai_dien = 'no-image.jpeg';
            else{//trường hợp update
                //bước 1 lấy lại giá trị logo cũ
                $sanpham = self::findOne($this->id);
                //Bước 2 gán giá trị logo mới = logo cũ
                $this->anh_dai_dien = $sanpham->anh_dai_dien;
            }
        }
        #endregion
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        PhanLoaiSanPham::deleteAll(['san_pham_id'=> $this->id]);
        if(is_array($this->phan_loai_san_phams))
            foreach ($this->phan_loai_san_phams as $phan_loai_san_pham){
                $plsp = new PhanLoaiSanPham();
                $plsp->phan_loai_id = $phan_loai_san_pham;
                $plsp->san_pham_id = $this->id;
                $plsp->save();
            }

        //Sau khi lưu sản phẩm thì sẽ lưu size sp vào bảng size_sản_phẩm do 1 sản phẩm có nhiều size
        SizeSanPham::deleteAll(['san_pham_id'=>$this->id]);
        if(is_array($this->size_san_phams))
            foreach ($this->size_san_phams as $size_san_pham){
                $size_sp = new SizeSanPham();
                $size_sp->size_id = $size_san_pham;
                $size_sp->san_pham_id = $this->id;
                $size_sp->save();
            }



        TuKhoaSanPham::deleteAll(['san_pham_id'=>$this->id]);
        if($this->tu_khoa_san_phams!=''){
            $tukhoa = explode(',',$this->tu_khoa_san_phams);
            foreach ($tukhoa as $item){
               $old_tag = TuKhoa::findOne(['name'=>trim($item)]);
               if(!is_null($old_tag))
                   $id_tukhoa = $old_tag->id;
               else{
                   $new_tag = new TuKhoa();
                   $new_tag->name = $item;
                   $new_tag->save();
                   $id_tukhoa = $new_tag->id;
               }
            $tukhoa_sp = new TuKhoaSanPham();
            $tukhoa_sp->tu_khoa_id = $id_tukhoa;
            $tukhoa_sp->san_pham_id = $this->id;
            $tukhoa_sp->save();
            }
        }

        #region Upload file ảnh đại diện
        //upload ảnh sau khi lưu dữ liệu vào csdl thành công
        $file = UploadedFile::getInstance($this,'anh_dai_dien');
        if(!is_null($file)){
            $ten_file = $this->anh_dai_dien;
            $path = dirname(dirname(__DIR__)).'/images/'.$ten_file;
            $file->saveAs($path);

            if(!$insert){
                $ten_file_cu =Yii::$app->session->get('old_name_logo');
                if($ten_file_cu!= 'no-image.jpeg'){
                    $path = dirname(dirname(__DIR__)).'/images/'.$ten_file_cu;
                    if(is_file($path))
                        unlink($path);
                }
            }
        }
        #endregion

        #region Upload file ảnh liên quan
        $files = UploadedFile::getInstances($this, 'anh_san_phams');
        foreach ($files as $file){
            $ten_file = time().$file->name;//lấy tên file

            $anh_slider = new AnhSanPham();
            $anh_slider->san_pham_id = $this->id;
            $anh_slider->file = $ten_file;

            if($anh_slider->save()){
                $path = dirname(dirname(__DIR__)).'/images/'.$ten_file;
                $file->saveAs($path);
            }

        }
        #endregion
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        // trước khi xóa thì cần xóa ảnh trên thư mục images trước
        if($this->anh_dai_dien !='no-image.jpeg'){
            $path = dirname(dirname(__DIR__)).'/images/'.$this->anh_dai_dien;
            if(is_file($path))
                unlink($path);
        }

        $anh_san_phams = AnhSanPham::findAll(['san_pham_id'=>$this->id]);
        foreach ($anh_san_phams as $anh_san_pham){
            $anh_san_pham->delete();//gọi hàm delete của đối tượng ảnh slider -> gọi sang hàm beforeDelete và afterDelete
        }

        SizeSanPham::deleteAll(['san_pham_id'=>$this->id]);
        TuKhoaSanPham::deleteAll(['san_pham_id'=>$this->id]);
        PhanLoaiSanPham::deleteAll(['san_pham_id'=>$this->id]);
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    //Gia trung bình
    public function getGiaGoiY($id_sanpham){
        $don_hang_chi_tiet = QuanLyChiTietDonHang::findAll(['san_pham_id'=>$id_sanpham,'type'=>'Nhập hàng']);
        $tong_gia_ban = 0;
        foreach ($don_hang_chi_tiet as $item){
            $tong_gia_ban +=$item->don_gia;
        }
        return $tong_gia_ban/count($don_hang_chi_tiet);
    }
}
