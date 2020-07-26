<template>
    <div>
        
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <router-link to="/projects" 
                class="nav-link active">Aktive Bauprojekte</router-link>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Serviceaufträge</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Archiv</a>
            </li>
        </ul>
    
    </div>
</template>

<script>
export default {
    name: 'projectsNav',
    
}
</script>