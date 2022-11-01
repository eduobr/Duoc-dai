function evento(){
    //propiedades
    this.nombre='';
    this.compania='';
    this.pais='';
    this.participo='';
    this.descripcion='';
    
    //metodos
    this.setNombre=function(nom){
        this.nombre=nom;
    }
    this.setCompania=function(comp){
        this.compania=comp;
    }
    this.setPais=function(pais){
        this.pais=pais;
    }
    this.setParticipo=function(part){
        this.participo=part;
    }
    this.setDescripcion=function(desc){
        this.descripcion=desc;
    }
    
    this.getNombre=function(){
        return this.nombre;
    }
    this.getCompania=function(){
        return this.compania;
    }
    this.getPais=function(){
        return this.pais;
    }
    this.getParticipo=function(){
        return this.participo;
    }
    this.getDescripcion=function(){
        return this.descripcion;
    }
    
    this.getEvento=function(){
        return ' Nombre Evento:'+this.nombre+' Compañia:'+this.compania
                +' Pais:'+this.pais+' Participo:'+this.participo
                +' Descripcion:'+this.descripcion;
    }
}


