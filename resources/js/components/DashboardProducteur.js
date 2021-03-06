import { apiServices } from '../_services/api.services'
import addConfiture from './dashboard/addConfiture.vue';

export default {
    components: {
        addConfiture
    },
    data() {
        return {
            headers: [{
                    text: 'Confitures',
                    align: 'start',
                    value: 'intitule'
                },
                {
                    text: 'Prix',
                    value: 'prix'
                },
                {
                    text: 'Fruits',
                    value: 'fruits',
                },
                {
                    text: 'Image',
                    value: 'image',
                },
                {
                    text: 'Actions',
                    value: 'actions',
                },
            ],
            datas: [],
            confitures: [],
        }
    },
    created() {
        this.initialize();
    },
    methods: {
        initialize() {
            apiServices.get('/api/producteur/confitures')
                .then((
                        data
                    ) =>
                    data.data.forEach(data => { //probleme de recuperation des données // normal vue que pas de producteur
                        this.datas.push(data);
                        // return data;
                    })
                )
                .catch();
        },
        displayFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.nom))
            })
            return fruits.join(', ');
        },
        uploadItem(item) {
            console.log(item);
        }
    },

}
