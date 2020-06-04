function shareSocial(e){
    e.preventDefault();
    window.open(e.target.closest('a').href, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=600,width=560,height=600");
}