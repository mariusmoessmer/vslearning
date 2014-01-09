var exercisetestapp = exercisetestapp || {};

exercisetestapp.WizardView = Backbone.View.extend({
    tagName: 'div',
    initialize: function() {
        _.bindAll(this, 'render', 'moveNext', 'addView', 'save');
        $(this.el).append($($("#wizard-template").html()));
        this.wizardViewTabs = $(this.el).find('#wizard-view-tabs');
        this.wizardViewContainer = $(this.el).find('#wizard-view-container');
        this.wizardViews = new WizardViews();
    },
    events: {
        "click .btn-nextView": "moveNext",
        "click .btn-save": "save",
    },
    render: function() {
        var currentView = this.wizardViews.getCurrent();
        if (currentView !== null) {

            if (currentView.getNext() === null) {
                $('.btn-nextView', this.el).hide();
                $('.form-actions', this.el).show();
            } else {
                $('.btn-nextView', this.el).show();
                $('.form-actions', this.el).hide();
            }

            //clear the active tab css class
            this.wizardViewTabs.
                    find('li').removeClass('active');

            //set the active tab for the current view
            this.wizardViewTabs.
                    find('a[title=' + currentView.getIndex() + ']').
                    parents('li:first').addClass('active');
            
            if(currentView.getIndex() >= this.wizardViews.count())
            {
                $('.progress-label', this.el).text('');
            }else
            {
                $('.progress-label', this.el).text(currentView.getIndex() + ' / ' + (this.wizardViews.count() - 1));
            }

            //show only the current view
            this.wizardViewContainer.find('.wizard-view:parent').hide();
            $(currentView.getView().render().el).show();

        }
        return this;
    },
    addView: function(view) {
        view.index = this.wizardViews.count() + 1;

        this.wizardViewTabs.
                append('<li><a href="#' + view.index + '" title="' + view.index + '">' + view.index + '</a></li>');

        this.wizardViewContainer.append($(view.ref.render().el).hide());
        this.wizardViews.addView(view);
    },
    moveNext: function() {
        if (this.updateModel())
        {
            this.wizardViews.moveNext();
            this.render();
            return false;
        }
    },
    updateModel: function() {
        return this.wizardViews.getCurrent().getView().updateModel();
        //favor view update method convention to force synchronous updates
    },
    save: function() {
        //
        
        // goto user-profile-page
        window.location = '/';
    }
});

var WizardViews = function() {

    var Node = function(view) {
        var _next = null; //reference next node
        var _view = view.ref; //referce current view
        var _index = view.index;
        return {
            setNext: function(node) {
                _next = node;
                return this;
            }, //chainable!
            getNext: function() {
                return _next;
            },
            getView: function() {
                return _view;
            },
            getIndex: function() {
                return _index;
            }
        };
    };

    var _head = null;
    var _tail = null;
    var _current = null;

    return {
        moveNext: function() {
            return (_current !== null) ? _current = _current.getNext() : null;
        }, //set current to next and return current or return null
        getCurrent: function() {
            return _current;
        },
        addView: function(view) {
            if (_tail === null) { // list is empty (implied head is null)                    
                _current = _tail = _head = new Node(view);
            }
            else {//list has nodes                    
                _tail = _tail.setNext(new Node(view)).getNext();
            }
        },
        count: function() {
            if (!_tail)
            {
                return 0;
            }

            return _tail.getIndex();
        }
    };
};