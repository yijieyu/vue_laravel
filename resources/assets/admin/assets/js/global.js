const commonFn = {
    toastMsg(type, msg){
        switch (type) {
            case 'normal':
                bus.$message(msg)
                break
            case 'success':
                bus.$message({
                    message: msg,
                    type: 'success'
                })
                break
            case 'warning':
                bus.$message({
                    message: msg,
                    type: 'warning'
                })
                break
            case 'error':
                bus.$message.error(msg)
                break
        }
    }
};

export default commonFn