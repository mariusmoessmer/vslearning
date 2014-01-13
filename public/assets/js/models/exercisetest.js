var exercisetestapp = exercisetestapp || {};
        exercisetestapp.ExerciseTest = Backbone.Model.extend({
        urlRoot: '/exercisetest',

                toJSON: function(){
                    var json = Backbone.Model.prototype.toJSON.call(this);
                    //alert(JSON.stringify(json));
                    return json;
                    //json.books = this.books.toJSON();
                    
                    
                }
        });


