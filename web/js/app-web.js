const app_web = new Vue({
    el: '#app-web',
    created: function () {
        this.$_base_url = 'http://localhost/~engineer/reportaquepasa/web/';
        this.$_service_url = this.$_base_url + 'index.php/app-web-service/';
        this.$_foto_reader = new FileReader();
        this.$_foto_reader.onload = this.$_onloadFileReader;
    },
    mounted: function () {
        this.$_loadTipoReporte();
    },
    data: {
        $_base_url: '',
        $_service_url: '',
        $_map: null,
        $_foto_reader: null,
        map_show: false,
        foto_show: false,
        foto_src: '',
        q: '',
        tipos_reporte: []
    },
    methods: {
        search: function () {
            //this.$_httpRequest('tipo-reporte-index', this.$_setTiposReporte);
            console.log('search');
        },
        createMap: function () {
            if (this.$_map == null) {
                if (!this.map_show) {
                    this.map_show = true;
                }
                this.$_map = L.map('app-web-map').setView([19.405, -102.05], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(this.$_map);
            }
        },
        selectFoto: function () {
            this.$refs.foto_input.click();
        },
        changeFoto: function () {
            if (this.$refs.foto_input.files.length) {
                this.$_foto_reader.readAsDataURL(this.$refs.foto_input.files[0]);
                /*
                this.foto_src = URL.createObjectURL(this.$refs.foto_input.files[0]);
                if (!this.foto_show) {
                    this.foto_show = true;
                }
                */
            }
        },
        $_httpRequest: function (url, onsuccess) {
            fetch(this.$_service_url + url).then((response) => {
                if (response.ok) {
                    response.json().then(onsuccess);
                } else {
                    throw new Error('HTTP error ' + response.status);
                }
            }).catch((error) => {
                //console.error(error);
            });
        },
        $_setTiposReporte: function (data) {
            var i, data_length = data.length;
            for (i = 0; i < data_length; i++) {
                data[i].src = this.$_base_url + 'tipo_reporte/' + data[i].id + '.jpg';
            }
            this.tipos_reporte = data;
        },
        $_loadTipoReporte: function () {
            this.$_httpRequest('tipo-reporte-index', this.$_setTiposReporte);
        },
        $_onloadFileReader: function () {
            this.foto_src = this.$_foto_reader.result;
            if (!this.foto_show) {
                this.foto_show = true;
            }
        }
    }
});