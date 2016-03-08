@extends('app')

@section('content')
    <script type="text/javascript">
        var collapseDivs, collapseLinks;

        function createDocumentStructure(tagName) {
            if (document.getElementsByTagName) {
                var elements = document.getElementsByTagName(tagName);
                collapseDivs = new Array(elements.length);
                collapseLinks = new Array(elements.length);
                for (var i = 0; i < elements.length; i++) {
                    var element = elements[i];
                    var siblingContainer;
                    if (document.createElement &&
                            (siblingContainer = document.createElement('div')) &&
                            siblingContainer.style) {
                        var nextSibling = element.nextSibling;
                        element.parentNode.insertBefore(siblingContainer, nextSibling);
                        var nextElement = elements[i + 1];
                        while (nextSibling != nextElement && nextSibling != null) {
                            var toMove = nextSibling;
                            nextSibling = nextSibling.nextSibling;
                            siblingContainer.appendChild(toMove);
                        }
                        siblingContainer.style.display = 'none';

                        collapseDivs[i] = siblingContainer;

                        createCollapseLink(element, siblingContainer, i);
                    }
                    else {
                        // no dynamic creation of elements possible
                        return;
                    }
                }
                createCollapseExpandAll(elements[0]);
            }
        }

        function createCollapseLink(element, siblingContainer, index) {
            var span;
            if (document.createElement && (span = document.createElement('span'))) {
                span.appendChild(document.createTextNode(String.fromCharCode(160)));
                var link = document.createElement('a');
                link.collapseDiv = siblingContainer;
                link.href = '#';
                link.appendChild(document.createTextNode('expand'));
                link.onclick = collapseExpandLink;
                collapseLinks[index] = link;
                span.appendChild(link);
                element.appendChild(span);
            }
        }

        function collapseExpandLink(evt) {
            if (this.collapseDiv.style.display == '') {
                this.parentNode.parentNode.nextSibling.style.display = 'none';
                this.firstChild.nodeValue = 'expand';
            }
            else {
                this.parentNode.parentNode.nextSibling.style.display = '';
                this.firstChild.nodeValue = 'collapse';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }

        function createCollapseExpandAll(firstElement) {
            var div;
            if (document.createElement && (div = document.createElement('div'))) {
                var link = document.createElement('a');
                link.href = '#';
                link.appendChild(document.createTextNode('expand all'));
                link.onclick = expandAll;
                div.appendChild(link);
                div.appendChild(document.createTextNode(' '));
                link = document.createElement('a');
                link.href = '#';
                link.appendChild(document.createTextNode('collapse all'));
                link.onclick = collapseAll;
                div.appendChild(link);
                firstElement.parentNode.insertBefore(div, firstElement);
            }
        }

        function expandAll(evt) {
            for (var i = 0; i < collapseDivs.length; i++) {
                collapseDivs[i].style.display = '';
                collapseLinks[i].firstChild.nodeValue = 'collapse';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }

        function collapseAll(evt) {
            for (var i = 0; i < collapseDivs.length; i++) {
                collapseDivs[i].style.display = 'none';
                collapseLinks[i].firstChild.nodeValue = 'expand';
            }

            if (evt && evt.preventDefault) {
                evt.preventDefault();
            }
            return false;
        }
    </script>
    <script type="text/javascript">
        window.onload = function (evt) {
            createDocumentStructure('h2');
        }
    </script>


    <div class="well">
        <h1>Frequently Asked Questions</h1>
        <p>Please click expand/collapse to view/hide the answer to the question.</p>

        <h2>What is in the database?</h2>
        <p>Some facts about RFI database are listed <a href="/overview">here</a>. To see what is in this database, click
            <a href="/tables"
               onclick="window.open('/tables', 'Popup', 'resizable=1,scrollbars=yes,width=1000,height=800'); return false;">
                here
            </a></p>
        <h2>What if basic search does not have results I need?</h2>
        <p>You can run your own SQL script in <a href="/advancedSearch">Advanced Search</a>.</p>

        <h2>How do I get maximum value of a column?</h2>
        <p>In advanced search page, input:
        <pre>
            SELECT MAX(attribut_name) FROM table_name;</pre>
        "attribut_name" is the column name, "table_name" is the table you need.
        </p>

        <h2>How do I do basic aggregation in advanced search?</h2>
        <p>Basic aggregation is the simplest grouping query pattern: for column foo, display the smallest, largest, sum,
            average or some other statistic of column bar values:
            <pre>
                SELECT foo, MIN(bar) AS bar
                FROM tbl
                GROUP BY foo;</pre>
        Instead of use MIN() for minimum, you can also use MAX() for largest,
        SUM() for sum, AVG() for average.
        </p>
        {{--
        <h2></h2>
        <p></p>
        --}}
    </div>
@endsection

