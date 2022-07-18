import Sidebar from "../components/sidebar/Sidebar.js";

document.addEventListener('DOMContentLoaded', function (e) {
    new Sidebar({
        props: {
            id: 'panel-sidebar',
        },
        state: {
            viewport: {
                "425": false,
                "768": false,
                "1024": true,
            },
        },
    });
});