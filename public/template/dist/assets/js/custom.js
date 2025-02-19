document.getElementById("jenisPaket").addEventListener("change", function () {
    const hargaPaket = {
        kiloan: 5000,
        selimut: 10000,
        bed_cover: 20000,
        kaos: 7000,
        lainnya: 15000
    };

    let selectedValue = this.value;

    document.getElementById("harga").value = hargaPaket[selectedValue] ? hargaPaket[selectedValue] : "";
});