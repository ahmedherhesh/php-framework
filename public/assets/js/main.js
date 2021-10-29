_.select('h1').on('click',function(){
    _.select(this).css({
        background:'#000',
        color: '#fff'
    });
}).css({
    width:'300px',
    height:'300px',
    marginRight: '10px',
    marginBottom: '5px',
    display:'inline-block',
    background:'#ddd',
    borderRadius:'10px',
    fontSize : '20px',
    textAlign : 'center',
    cursor: 'pointer'
});
