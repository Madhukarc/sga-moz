;<?php die() ?>
; SVN FILE: $Id$
<?php
/**
 * OpenSGA - Sistema de Gest�o Acad�mica
 *   Copyright (C) 2010-2011  INFOmoz (Inform�tica-Mo�ambique)
 * 
 * Este programa � um software livre: Voc� pode redistribuir e/ou modificar
 * todo ou parte deste programa, desde que siga os termos da licen�a por nele
 * estabelecidos. Grande parte do c�digo deste programa est� sob a licen�a 
 * GNU Affero General Public License publicada pela Free Software Foundation.
 * A vers�o original desta licen�a est� dispon�vel na pasta raiz deste software.
 * 
 * Este software � distribuido sob a perspectiva de que possa ser �til para 
 * satisfazer as necessidades dos seus utilizadores, mas SEM NENHUMA GARANTIA. Veja
 * os termos da licen�a GNU Affero General Public License para mais detalhes
 * 
 * As redistribui��es deste software, mesmo quando o c�digo-fonte for modificado significativamente,
 * devem manter est� informa��o legal, assim como a licen�a original do software.
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Inform�tica-Mo�ambique) (http://infomoz.net)
 * @link          http://infomoz.net/opensga CakePHP(tm) Project
 * @author		  Elisio Leonardo (http://infomoz.net/elisio-leonardo)
 * @package       opensga
 * @subpackage    opensga.core.config
 * @since         OpenSGA v 0.10.0.0
 * @license       GNU Affero General Public License
 * 
 */

; acl.ini.php - Cake ACL Configuration
; ---------------------------------------------------------------------
; Use this file to specify user permissions.
; aco = access control object (something in your application)
; aro = access request object (something requesting access)
;
; User records are added as follows:
;
; [uid]
; groups = group1, group2, group3
; allow = aco1, aco2, aco3
; deny = aco4, aco5, aco6
;
; Group records are added in a similar manner:
;
; [gid]
; allow = aco1, aco2, aco3
; deny = aco4, aco5, aco6
;
; The allow, deny, and groups sections are all optional.
; NOTE: groups names *cannot* ever be the same as usernames!
;
; ACL permissions are checked in the following order:
; 1. Check for user denies (and DENY if specified)
; 2. Check for user allows (and ALLOW if specified)
; 3. Gather user's groups
; 4. Check group denies (and DENY if specified)
; 5. Check group allows (and ALLOW if specified)
; 6. If no aro, aco, or group information is found, DENY
;
; ---------------------------------------------------------------------

;-------------------------------------
;Users
;-------------------------------------

[username-goes-here]
groups = group1, group2
deny = aco1, aco2
allow = aco3, aco4

;-------------------------------------
;Groups
;-------------------------------------

[groupname-goes-here]
deny = aco5, aco6
allow = aco7, aco8