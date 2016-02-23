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
        <h1>Tables in RFI database and their description</h1>
        <h3>Please click expand/collapse to view/hide what is in the table</h3>
    </div>
    <div class="well">
        <h2>Table: id</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>gen</td>
                <td>pig's generation</td>
            </tr>
            <tr>
                <td>par</td>
                <td>pig's parity</td>
            </tr>
            <tr>
                <td>ear</td>
                <td>ear notch ( in form of litter-pig)</td>
            </tr>
            <tr>
                <td>old_idpig</td>
                <td>old pig id</td>
            </tr>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>idsire</td>
                <td>new pig id for the sire giving birth to this piglet</td>
            </tr>
            <tr>
                <td>iddam</td>
                <td>new pig id for the dam giving birth to this piglet</td>
            </tr>
            <tr>
                <td>dam_sire_gen</td>
                <td>the generatio of the dam and sire giving birth to this pig</td>
            </tr>
            <tr>
                <td>dam_sire_par</td>
                <td>the parity of the dam and sire giving birth to this pig</td>
            </tr>
            <tr>
                <td>sex</td>
                <td>"1=boar, 2= gilt, 3=barrow"</td>
            </tr>
            <tr>
                <td>line</td>
                <td>"1= low RFI line, 2= high RFI line, 3=non-York"</td>
            </tr>
            <tr>
                <td>grp</td>
                <td>group</td>
            </tr>
            <tr>
                <td>barn</td>
            </tr>
            <tr>
                <td>finish_pen</td>
            </tr>
            <tr>
                <td>diet</td>
                <td>diet the pig feed on</td>
            </tr>
            <tr>
                <td>f_date</td>
                <td>farrowing/birth date (kg)</td>
            </tr>
            <tr>
                <td>litter</td>
                <td>litter number</td>
            </tr>
            <tr>
                <td>birth_wt</td>
                <td>weight of piglet at birth (kg)</td>
            </tr>
            <tr>
                <td>teats</td>
                <td>number of teats</td>
            </tr>
            <tr>
                <td>wean_date</td>
                <td>weaning date</td>
            </tr>
            <tr>
                <td>wean_wt</td>
                <td>weaning weight (kg)</td>
            </tr>
            <tr>
                <td>fost_dam</td>
                <td>sow ear notch that piglet was moved to</td>
            </tr>
            <tr>
                <td>dod</td>
                <td>date piglet died or was euthanized</td>
            </tr>
            <tr>
                <td>castrate</td>
                <td>"1=yes, default=no"</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: feeding_behavior</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>adfi</td>
                <td>average daily feed intake over the whole test period</td>
            </tr>
            <tr>
                <td>adfi1</td>
                <td>average daily feed intake for the first half of the test period</td>
            </tr>
            <tr>
                <td>adfi2</td>
                <td>average daily feed intake for the second half of the test period</td>
            </tr>
            <tr>
                <td>afiv</td>
                <td>average feed intake per visit over the whole test period</td>
            </tr>
            <tr>
                <td>afiv1</td>
                <td>average feed intake per visit for the first half of the test period</td>
            </tr>
            <tr>
                <td>afiv2</td>
                <td>average feed intake per visit for the second half of the test period</td>
            </tr>
            <tr>
                <td>afrv</td>
                <td>average feeding rate per visit over the whole test period</td>
            </tr>
            <tr>
                <td>afrv1</td>
                <td>average feeding rate per visit for the first half of the test period</td>
            </tr>
            <tr>
                <td>afrv2</td>
                <td>average feeding rate per visit for the second half of the test period</td>
            </tr>
            <tr>
                <td>anvd</td>
                <td>average number of visits per day over the whole test period</td>
            </tr>
            <tr>
                <td>anvd1</td>
                <td>average number of visits per day for the first half of the test period</td>
            </tr>
            <tr>
                <td>anvd2</td>
                <td>average number of visits per day for the second half of the test period</td>
            </tr>
            <tr>
                <td>aotd</td>
                <td>average occupation time per day over the whole test period</td>
            </tr>
            <tr>
                <td>aotd1</td>
                <td>average occupation time per day for the first half of the test period</td>
            </tr>
            <tr>
                <td>aotd2</td>
                <td>average occupation time per day for the second half of the test period</td>
            </tr>
            <tr>
                <td>aotv</td>
                <td>average occupation time per visit over the whole test period</td>
            </tr>
            <tr>
                <td>aotv1</td>
                <td>average occupation time per visit for the first half of the test period</td>
            </tr>
            <tr>
                <td>aotv2</td>
                <td>average occupation time per visit for the second half of the test period</td>
            </tr>
            <tr>
                <td>thr</td>
                <td>"two hour block (1 is for midnight to 2 am, 2 is for 2 am to 4 am, 3 is for 4 am to 6 am, etc.)"
                </td>
            </tr>
            <tr>
                <td>anv2h</td>
                <td>average number of visits per 2 hr block over the whole test period</td>
            </tr>
            <tr>
                <td>aot2h</td>
                <td>average occupation time per 2 hr block over the whole test period</td>
            </tr>
            <tr>
                <td>afi2h</td>
                <td>average feed intake per 2 hr block over the whole test period</td>
            </tr>
            <tr>
                <td>anv2h1</td>
                <td>average number of visits per 2 hr block for the first half of the test period</td>
            </tr>
            <tr>
                <td>aot2h1</td>
                <td>average occupation time per 2 hr block for the first half of the test period</td>
            </tr>
            <tr>
                <td>afi2h1</td>
                <td>average feed intake per 2 hr block for the first half of the test period</td>
            </tr>
            <tr>
                <td>anv2h2</td>
                <td>average number of visits per 2 hr block for the second half of the test period</td>
            </tr>
            <tr>
                <td>aot2h2</td>
                <td>average occupation time per 2 hr block for the second half of the test period</td>
            </tr>
            <tr>
                <td>afi2h2</td>
                <td>average feed intake per 2 hr block for the second half of the test period</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: rfi</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>testlng</td>
                <td>test length for feed efficiency (day)</td>
            </tr>
            <tr>
                <td>onwt</td>
                <td>ontest weight (kg)</td>
            </tr>
            <tr>
                <td>offwt</td>
                <td>offtest weight (kg)</td>
            </tr>
            <tr>
                <td>ondate</td>
                <td>ontest date</td>
            </tr>
            <tr>
                <td>onage</td>
                <td>ontest age (day)</td>
            </tr>
            <tr>
                <td>offage</td>
                <td>offtest age (day)</td>
            </tr>
            <tr>
                <td>adg</td>
                <td>average daily gain (kg/day)</td>
            </tr>
            <tr>
                <td>metamidw</td>
                <td>average of onweight^0.75 and offweight^0.75 (kg)</td>
            </tr>
            <tr>
                <td>adfiind</td>
                <td>average daiky feed intake predicted from old procedure (quadratic regression on pig by pig base)
                    between onage and offage (kg/day)
                </td>
            </tr>
            <tr>
                <td>offbf</td>
                <td>offscan backfat (cm)</td>
            </tr>
            <tr>
                <td>offlma</td>
                <td>offscan longissimus muscle area (cm^2)</td>
            </tr>
            <tr>
                <td>offscandate</td>
                <td>offscan date</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: calcr</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>genotype</td>
                <td>genotype of calcr locus</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: carcass</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>slaughter_date</td>
                <td>slaughter date</td>
            </tr>
            <tr>
                <td>weight</td>
                <td>carcass wieght (kg)</td>
            </tr>
            <tr>
                <td>length</td>
                <td>carcass length (cm)</td>
            </tr>
            <tr>
                <td>bf_10</td>
                <td>backfat (cm)</td>
            </tr>
            <tr>
                <td>bf_last_rib</td>
                <td>backfat (cm)</td>
            </tr>
            <tr>
                <td>bf_last_lum</td>
                <td>backfat (cm)</td>
            </tr>
            <tr>
                <td>lma</td>
                <td>longissimus muscle area (cm^2)</td>
            </tr>
            <tr>
                <td>color</td>
            </tr>
            <tr>
                <td>firmness</td>
            </tr>
            <tr>
                <td>marbling</td>
            </tr>
            <tr>
                <td>pH</td>
            </tr>
            <tr>
                <td>min_Y</td>
            </tr>
            <tr>
                <td>Hunter_L</td>
            </tr>
            <tr>
                <td>HCW</td>
            </tr>
            <tr>
                <td>trim</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: cbc</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>Wn2Bl</td>
                <td>days from weaning to bleeding (day)</td>
            </tr>
            <tr>
                <td>WBC</td>
                <td>white blood cell count (x 10^3/ul)</td>
            </tr>
            <tr>
                <td>RBC</td>
                <td>red blood cell count (x10^6/ul)</td>
            </tr>
            <tr>
                <td>hemoglobin</td>
                <td>hemoglobin molecule fills up the red blood cells (gm/dl)</td>
            </tr>
            <tr>
                <td>hematocrit</td>
                <td>?the amount of space (volume) red blood cells take up in the blood (%)</td>
            </tr>
            <tr>
                <td>MCV</td>
                <td>?mean corpuscular volume (fl)</td>
            </tr>
            <tr>
                <td>MCH</td>
                <td>mean corpuscular hemoglobin(pg)</td>
            </tr>
            <tr>
                <td>MCHC</td>
                <td>mean corpuscular hemoglobin concentration (gm/dl)</td>
            </tr>
            <tr>
                <td>RDW</td>
                <td>Red cell distribution width(%)</td>
            </tr>
            <tr>
                <td>platelet_auto</td>
                <td>Platelet (thrombocyte) count(x10^3)</td>
            </tr>
            <tr>
                <td>MPV</td>
                <td>Mean platelet volume (fl)</td>
            </tr>
            <tr>
                <td>neutrophil</td>
                <td>neutrophil count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>lymphocyte</td>
                <td>lymphocyte count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>monocyte</td>
                <td>monocyte count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>eosinophil</td>
                <td>eosinophil count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>basophil</td>
                <td>basophil count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>unidentifiedCells</td>
                <td>unidentified cells count (x10^3/ul)</td>
            </tr>
            <tr>
                <td>platelets_clumped</td>
                <td>platellets clumped or not</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: dam_mate</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idmate</td>
                <td>mating id</td>
            </tr>
            <tr>
                <td>iddam</td>
                <td>new pig id for the dam</td>
            </tr>
            <tr>
                <td>tag</td>
                <td>ear tag</td>
            </tr>
            <tr>
                <td>idsire</td>
                <td>new pig id for the mating sire</td>
            </tr>
            <tr>
                <td>for_gen</td>
                <td>generation the mating will give birth to</td>
            </tr>
            <tr>
                <td>for_parity</td>
                <td>parity the mating will give birth to</td>
            </tr>
            <tr>
                <td>bred_date</td>
                <td>date dam was bred</td>
            </tr>
            <tr>
                <td>sfwt</td>
                <td>weight of sow when moved into farrowing house (kg)</td>
            </tr>
            <tr>
                <td>sfbf</td>
                <td>backfat thickness of sow when moved into farrowing house (cm)</td>
            </tr>
            <tr>
                <td>swwt</td>
                <td>weight of sow at weaning (kg)</td>
            </tr>
            <tr>
                <td>swbf</td>
                <td>backfat thickness of sow at weaning (cm)</td>
            </tr>
            <tr>
                <td>sfi</td>
                <td>sow feed intake during lactation</td>
            </tr>
            <tr>
                <td>pfi</td>
                <td>piglet feed intake during lactation</td>
            </tr>
            <tr>
                <td>litter</td>
                <td>litter number of piglets</td>
            </tr>
            <tr>
                <td>wn_date</td>
                <td>date when litter was weaned</td>
            </tr>
            <tr>
                <td>f_wt_date</td>
                <td>date sow moved into farrowing house</td>
            </tr>
            <tr>
                <td>f_pen</td>
                <td>"farrowing pen of sow, room-pen"</td>
            </tr>
            <tr>
                <td>f_date</td>
                <td>date when litter was born</td>
            </tr>
            <tr>
                <td>KSU_wt_date</td>
            </tr>
            <tr>
                <td>row</td>
                <td>pen's row</td>
            </tr>
            <tr>
                <td>gestation_pen</td>
                <td>gestation pen of sow</td>
            </tr>
            <tr>
                <td>diet</td>
                <td>diet the dam feed on??</td>
            </tr>
            <tr>
                <td>comm</td>
                <td>"1=farrow before weighing, 2=dudded, 3=death, 4=lame, 6=sold"</td>
            </tr>
            <tr>
                <td>comm1</td>
            </tr>
            <tr>
                <td>cull_date</td>
                <td>date sow was removed from the breeding herd or died</td>
            </tr>
            <tr>
                <td>category</td>
                <td>"1=primary, 2=alternative"</td>
            </tr>
            <tr>
                <td>pt_result</td>
            </tr>
            <tr>
                <td>pt_date</td>
            </tr>
            <tr>
                <td>comm_origin</td>
            </tr>
            <tr>
                <td>old_ear</td>
                <td>"old ear, in format of 123-04-00S"</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: genotyping</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>dataset</td>
            </tr>
            <tr>
                <td>sample_id</td>
                <td>id of the sample</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: igf</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>igf1</td>
                <td>igf-1 concentration</td>
            </tr>
            <tr>
                <td>batch</td>
            </tr>
            <tr>
                <td>plate</td>
            </tr>
            <tr>
                <td>sample_no</td>
            </tr>
            <tr>
                <td>test_date</td>
                <td>igf-1 measuring date</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: imf</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>imf</td>
                <td>intramuscular fat</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: mcr4</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>genotype</td>
                <td>genotype of mc4r locus</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: meat_qual</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>sequence</td>
                <td>processing order</td>
            </tr>
            <tr>
                <td>HCW</td>
            </tr>
            <tr>
                <td>BFMM</td>
            </tr>
            <tr>
                <td>LEMM</td>
            </tr>
            <tr>
                <td>PLEAN</td>
            </tr>
            <tr>
                <td>pH</td>
            </tr>
            <tr>
                <td>drip_loss_percent</td>
            </tr>
            <tr>
                <td>WHC_percent</td>
            </tr>
            <tr>
                <td>wetness</td>
            </tr>
            <tr>
                <td>firmness</td>
            </tr>
            <tr>
                <td>color</td>
            </tr>
            <tr>
                <td>marbling</td>
            </tr>
            <tr>
                <td>D65L</td>
            </tr>
            <tr>
                <td>D65a</td>
            </tr>
            <tr>
                <td>D65b</td>
            </tr>
            <tr>
                <td>CL</td>
            </tr>
            <tr>
                <td>Ca</td>
            </tr>
            <tr>
                <td>Cb</td>
            </tr>
            <tr>
                <td>purge_percent</td>
            </tr>
            <tr>
                <td>SpH</td>
            </tr>
            <tr>
                <td>cook_loss</td>
            </tr>
            <tr>
                <td>JCS</td>
            </tr>
            <tr>
                <td>L</td>
            </tr>
            <tr>
                <td>a</td>
            </tr>
            <tr>
                <td>b</td>
            </tr>
            <tr>
                <td>juic</td>
            </tr>
            <tr>
                <td>tend</td>
            </tr>
            <tr>
                <td>chew</td>
            </tr>
            <tr>
                <td>pork_flav</td>
            </tr>
            <tr>
                <td>off_flav</td>
            </tr>
            <tr>
                <td>SP</td>
            </tr>
            <tr>
                <td>fat_percent</td>
            </tr>
            <tr>
                <td>mst_percent</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: mix</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>fdr_type</td>
            </tr>
            <tr>
                <td>bleed_date</td>
                <td>bleeding date (between 35-42 days)</td>
            </tr>
            <tr>
                <td>sick_whn_bled</td>
                <td>health status when bled</td>
            </tr>
            <tr>
                <td>pretestwt</td>
                <td>pretest weight (kg)</td>
            </tr>
            <tr>
                <td>pretestdate</td>
                <td>pretest date</td>
            </tr>
            <tr>
                <td>post_wn_date</td>
                <td>date of post weaning weight (one wk after weaning)</td>
            </tr>
            <tr>
                <td>post_wn_wt</td>
                <td>weight one week after weaning (kg)</td>
            </tr>
            <tr>
                <td>total_wt</td>
                <td>total weighted with the recording person (kg)</td>
            </tr>
            <tr>
                <td>tare_wt</td>
                <td>weight of the recording person (kg)</td>
            </tr>
            <tr>
                <td>saw</td>
            </tr>
            <tr>
                <td>transp</td>
            </tr>
            <tr>
                <td>transp2</td>
            </tr>
            <tr>
                <td>transp3</td>
            </tr>
            <tr>
                <td>tattoo</td>
            </tr>
            <tr>
                <td>marker_color</td>
            </tr>
            <tr>
                <td>slaughter_grp</td>
                <td>slaughter group</td>
            </tr>
            <tr>
                <td>barn_from</td>
            </tr>
            <tr>
                <td>on_temp</td>
            </tr>
            <tr>
                <td>temp2</td>
            </tr>
            <tr>
                <td>temp2_date</td>
            </tr>
            <tr>
                <td>therm</td>
            </tr>
            <tr>
                <td>scanner</td>
            </tr>
            <tr>
                <td>comment</td>
            </tr>
            <tr>
                <td>comm</td>
                <td>"1=mummy, 2=stillborn, 3=death, 4=sold"</td>
            </tr>
            <tr>
                <td>comm2</td>
                <td>"1=crushed/laid on, 2=starved, 3=failure to thrive, 4=euthanize, 5=killed by sow, 6=dead at weaning,
                    7=dead due to sickness, 8=anemic"
                </td>
            </tr>
            <tr>
                <td>comm3</td>
                <td>"1=other, 2=spraddle legs, 3=missing/deformed feet, 4=clef palate, 5= cripple/deformed legs, 6=low
                    birth weight, 7=stepped on, 8=sick, 9=deformed head, 10=poor doing/failure to thrive"
                </td>
            </tr>
            <tr>
                <td>comm4</td>
                <td>"1=belly rupture, 2=rupture, 3=lame, 4=runt, 5=cauliflower ear, 6=sickness, 7=one testicle,
                    8=abscess, 9=shaker"
                </td>
            </tr>
            <tr>
                <td>comm_after_offset</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: rfi_rnaseq</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idsample</td>
                <td>sample id</td>
            </tr>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>blk</td>
                <td>block of experimental design</td>
            </tr>
            <tr>
                <td>ord</td>
                <td>order in block</td>
            </tr>
            <tr>
                <td>pre_conc</td>
                <td>"RNA concentration after RNA prep, before globin depletion (ng/ul)"</td>
            </tr>
            <tr>
                <td>pre_RIN</td>
                <td>"RIN after RNA prep, before globin depletion"</td>
            </tr>
            <tr>
                <td>post_conc</td>
                <td>RNA concentration after globin depletion (ng/ul)</td>
            </tr>
            <tr>
                <td>post_RIN</td>
                <td>RIN after globin depletion</td>
            </tr>
            <tr>
                <td>RNA_date</td>
                <td>RNA prep date</td>
            </tr>
            <tr>
                <td>GD_date</td>
                <td>globin depletion date</td>
            </tr>
            <tr>
                <td>lane</td>
                <td>lane where RNA sequenced</td>
            </tr>
            <tr>
                <td>seq_year</td>
                <td>RNA-seq year</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: scan</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idscan</td>
                <td>scan id</td>
            </tr>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>bf</td>
                <td>backfat (cm)</td>
            </tr>
            <tr>
                <td>lma</td>
                <td>longissimus muscle area (cm^2)</td>
            </tr>
            <tr>
                <td>date</td>
                <td>scan date</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: scid</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>diagnosis</td>
                <td>"status of scid genotyping: normal, carrier, SCID, or unknown"</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: sire</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>tag</td>
                <td>ear tag</td>
            </tr>
            <tr>
                <td>pen</td>
            </tr>
            <tr>
                <td>category</td>
            </tr>
            <tr>
                <td>boar_group</td>
            </tr>
            <tr>
                <td>rank</td>
            </tr>
            <tr>
                <td>comment</td>
            </tr>
            <tr>
                <td>old_ear</td>
                <td>"old ear label, in format of XXX-XX-00S OR in text for alias"</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: weight</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>wt</td>
                <td>weight (kg)</td>
            </tr>
            <tr>
                <td>wt_date</td>
                <td>weighting date</td>
            </tr>
            <tr>
                <td>adg</td>
                <td>average daily gain (kg/day)</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: blood_inventory</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>bleed_no</td>
                <td>"bleeding sequence: 1st, 2nd, ..."</td>
            </tr>
            <tr>
                <td>bleed</td>
            </tr>
            <tr>
                <td>alternative</td>
            </tr>
            <tr>
                <td>Tempus_tube_in_box</td>
                <td>box label for Tempus tube</td>
            </tr>
            <tr>
                <td>pos_in_box</td>
                <td>position in box</td>
            </tr>
            <tr>
                <td>copy</td>
                <td>copy of each blood sample</td>
            </tr>
            <tr>
                <td>location</td>
                <td>box location</td>
            </tr>
            <tr>
                <td>comment_whn_bleeding</td>
                <td>health status when bled</td>
            </tr>
            <tr>
                <td>comment</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: lps_rfi</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idpig</td>
                <td>"new pig id, a combination of parity, generation and ear notch (since generation 0, in the format of
                    one digit for parity, two digits for generation,six digits for ear notch)"
                </td>
            </tr>
            <tr>
                <td>ear_tag</td>
                <td>ear tag</td>
            </tr>
            <tr>
                <td>exp_grp</td>
                <td>"experiment group: chall, challenge; con, control"</td>
            </tr>
            <tr>
                <td>prep_no</td>
                <td>RNA preparation group number</td>
            </tr>
            <tr>
                <td>onwt</td>
                <td>onweight for feed efficiency (FE) test (kg)</td>
            </tr>
            <tr>
                <td>onage</td>
                <td>onage for FE test</td>
            </tr>
            <tr>
                <td>Ondate</td>
                <td>ondate for FE test</td>
            </tr>
            <tr>
                <td>Midwt</td>
                <td>midweight (kg)</td>
            </tr>
            <tr>
                <td>MidwtDate</td>
                <td>midweight date</td>
            </tr>
            <tr>
                <td>Offwt</td>
                <td>offweight (kg)</td>
            </tr>
            <tr>
                <td>Offdate</td>
                <td>offdate</td>
            </tr>
            <tr>
                <td>total_FI</td>
                <td>total feed intake</td>
            </tr>
            <tr>
                <td>testlngth</td>
                <td>test length (day)</td>
            </tr>
            <tr>
                <td>pen</td>
                <td>pen for test</td>
            </tr>
            <tr>
                <td>room</td>
                <td>room for test</td>
            </tr>
            <tr>
                <td>offbf</td>
                <td>offscan backfat (cm0</td>
            </tr>
            <tr>
                <td>growth</td>
            </tr>
            <tr>
                <td>adg</td>
                <td>average daily gain</td>
            </tr>
            <tr>
                <td>adfi</td>
                <td>average daily feed intake</td>
            </tr>
            <tr>
                <td>adga</td>
                <td>average daily gain adjusted</td>
            </tr>
            <tr>
                <td>offbfa</td>
                <td>offtest bakcfat adjusted</td>
            </tr>
            <tr>
                <td>crate_no</td>
                <td>crate number</td>
            </tr>
            <tr>
                <td>wt_trt</td>
                <td>weight when LPS stimulated (kg)</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: lps_inventory</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>eartag</td>
                <td>ear tag</td>
            </tr>
            <tr>
                <td>bulk</td>
            </tr>
            <tr>
                <td>hpt</td>
                <td>hours post treatment (hour)</td>
            </tr>
            <tr>
                <td>boxID</td>
                <td>boxID</td>
            </tr>
            <tr>
                <td>location</td>
                <td>box location</td>
            </tr>
            <tr>
                <td>comnt</td>
                <td>comment</td>
            </tr>
            </tbody>
        </table>
        <h2>Table: lps_rnaseq</h2>
        <p></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="col-sm-4">Attribute name</th>
                <th class="col-sm-8">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>idsample</td>
                <td>sample id</td>
            </tr>
            <tr>
                <td>eartag</td>
                <td>ear tag</td>
            </tr>
            <tr>
                <td>hpt</td>
                <td>hours post treatment (hour)</td>
            </tr>
            <tr>
                <td>RNA_date</td>
                <td>RNA extraction date</td>
            </tr>
            <tr>
                <td>kit</td>
                <td>kit number</td>
            </tr>
            <tr>
                <td>pre_conc</td>
                <td>RNA concentration after prep and before globin depletion (ng/ul)</td>
            </tr>
            <tr>
                <td>pre_RIN</td>
                <td>RIN after prep and before globin depletion</td>
            </tr>
            <tr>
                <td>post_conc</td>
                <td>RNA cocentration after globin depletion (ng/ul)</td>
            </tr>
            <tr>
                <td>post_RIN</td>
                <td>RIN after globin depletion</td>
            </tr>
            <tr>
                <td>lane</td>
                <td>RNA-seq sequncing lane</td>
            </tr>
            <tr>
                <td>comnt</td>
                <td>comment</td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

