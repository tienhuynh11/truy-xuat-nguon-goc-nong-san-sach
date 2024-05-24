
const getProvince = async () => {
    let Response = await fetch(`https://the-best-api.000webhostapp.com/getProvince/`);
    let data = await Response.json();
    return data;
}
//Lấy api tỉnh
getProvince().then(data => {
    const selectProvince = document.getElementById('province');
    selectProvince.innerHTML = '';

    const defaultOptionProvince = document.createElement('option');
    defaultOptionProvince.value = '';
    defaultOptionProvince.textContent = 'Chọn tỉnh/thành phố';
    selectProvince.appendChild(defaultOptionProvince);

    data.data.forEach(province => {
        const optionProvince = document.createElement('option');
        optionProvince.value = province.PROVINCE_ID + '-' + province.PROVINCE_NAME;
        optionProvince.textContent = province.PROVINCE_NAME;
        selectProvince.appendChild(optionProvince);
    });
})
//Lấy api xã theo quận huyện
const handleChangeDistrict = (obj) => {
    const val = obj.value;
    let id = val.split("-")[0];
    const getWards = async (id) => {
        let response = await fetch(`https://the-best-api.000webhostapp.com/getWard/index.php?districtId=${id}`);
        let data = await response.json();
        return data;
    }
    getWards(id).then(data => {
        const selectWards = document.getElementById('wards');
        selectWards.innerHTML = '';

        const defaultOptionWards = document.createElement('option');
        defaultOptionWards.value = '';
        defaultOptionWards.textContent = 'Chọn xã/phường';
        selectWards.appendChild(defaultOptionWards);

        data.data.forEach(wards => {
            const optionwards = document.createElement('option');
            optionwards.value = wards.WARDS_ID + '-' + wards.WARDS_NAME;
            optionwards.textContent = wards.WARDS_NAME;
            selectWards.appendChild(optionwards);
        });
    })
}
//Lấy api quận huyện theo tỉnh/thành phố
const handleChange = (obj) => { //arrow function đối số là obj
    const val = obj.value
    let id = val.split("-")[0];
    // lấy value của thẻ option đó
    //sessionStorage.setItem('id') = val // lưu vào session
    const getDistrict = async (id) => {
        let Response = await fetch(`https://the-best-api.000webhostapp.com/getDistrict/index.php?provinceId=${id}`);
        let data = await Response.json();
        return data;
    }

    getDistrict(id).then(data => {
        const selectDistrict = document.getElementById('district');
        selectDistrict.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Chọn quận/huyện';
        selectDistrict.appendChild(defaultOption);

        data.data.forEach(district => {
            const option = document.createElement('option');
            option.value = district.DISTRICT_ID + '-' + district.DISTRICT_NAME;
            option.textContent = district.DISTRICT_NAME;
            selectDistrict.appendChild(option);
        });
    });
}

//Select2
$(document).ready(function() {
    $("#nguoidaidien").select2();
    $("#nhatky").select2();
    $("#province").select2();
    $("#district").select2();
    $("#wards").select2();
    $("#danhmuc_nx").select2();
    $("#doanhnghiep").select2();
    // $("#vsx").select2();
});
