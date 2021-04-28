<template lang="pug">
.map.w-100(ref='map')
</template>

<script>
import { Loader } from '@googlemaps/js-api-loader';

export default {
    name: 'Map',
    props: ['users', 'apiKey'],
    mounted: function () {
        const loader = new Loader({
            apiKey: this.apiKey,
            version: 'weekly',
        });
        loader.load().then(() => {
            this.map = new google.maps.Map(this.$refs.map, {
                center: { lat: 51.509865, lng: -0.118092 },
                zoom: 4,
            });
            if (this.users.length > 0) {
                this.initMarkers(this.users);
            }
        });
    },
    data: function () {
        return {
            map: null,
            markers: [],
        };
    },
    watch: {
        users: function (new_val) {
            if (google) {
                this.initMarkers(new_val);
            }
        },
    },
    methods: {
        initMarkers: function (users) {
            this.clearMarkers();
            users.forEach((user) => this.addMarkers(user));
        },
        addMarkers: function (user) {
            const is_male = user.gender.toLowerCase() === 'male';
            const marker = new google.maps.Marker({
                position: new google.maps.LatLng(user.lat, user.lon),
                icon: `http://maps.google.com/mapfiles/ms/icons/${
                    is_male ? 'blue' : 'pink'
                }-dot.png`,
                map: this.map,
            });
            this.markers.push(marker);

            const infowindow = new google.maps.InfoWindow({
                content: this.infoWindowForUser(user, is_male),
            });
            marker.addListener('click', () => {
                infowindow.open(this.map, marker);
            });
        },
        infoWindowForUser: function (user, is_male) {
            const gender_class = is_male ? 'fas fa-male' : 'fas fa-female';

            return `
            <div class="info-content">
                <div class="name">
                    <strong>${[user.first_name, user.last_name].join(' ')}</strong>
                    <div class="gender">
                        <span class="${gender_class}"></span>
                    </div>
                </div>
                <div class="position">
                    <span class="fas fa-globe"></span>
                    <span>${[user.lat, user.lon].join(', ')}</span>
                </div>
            </div>
            `;
        },
        clearMarkers: function () {
            (this.markers || []).forEach((marker) => marker.setMap(null));

            this.markers = [];
        },
    },
};
</script>