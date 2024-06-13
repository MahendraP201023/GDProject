Vtiger_Detail_Js("Calendar_Detail_Js", {
    
}, {
    
    _delete : function(deleteRecordActionUrl) {
        var params = app.convertUrlToDataParams(deleteRecordActionUrl+"&ajaxDelete=true");
        app.helper.showProgress();
        app.request.post({data:params}).then(
        function(err,data){
            app.helper.hideProgress();
            if(err === null) {
                if(typeof data !== 'object') {
                    window.location.href = data;
                } else {
                    app.helper.showAlertBox({'message' : data.prototype.message});
                }
            } else {
                app.helper.showAlertBox({'message' : err});
            }
        });
    },
    
    /**
    * To Delete Record from detail View
    * @param URL deleteRecordActionUrl
    * @returns {undefined}
    */
    remove : function(deleteRecordActionUrl) {
        var thisInstance = this;
        var isRecurringEvent = jQuery('#addEventRepeatUI').data('recurringEnabled');
        if(isRecurringEvent) {
            app.helper.showConfirmationForRepeatEvents().then(function(postData) {
                deleteRecordActionUrl += '&' + jQuery.param(postData);
                thisInstance._delete(deleteRecordActionUrl);
            });
        } else {
            this._super(deleteRecordActionUrl);
        }
    },    
    
    registerEvents : function() {
        this._super();
        
        $('.block_LBL_REMINDER_INFORMATION').addClass('hide');
        $('.block_LBL_RECURRENCE_INFORMATION').addClass('hide');
        $('.block_LBL_RELATED_TO').addClass('hide');
        $('.block_LBL_INVITE_USER_BLOCK').addClass('hide');
    }
    
});